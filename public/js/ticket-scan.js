// File: public/js/ticket-scan.js
class TicketScanner {
    constructor() {
        this.html5QrCode = null;
        this.isScanning = false;
        this.currentTicketBarcode = null;
        this.scannerActive = false;
    }

    // Initialize scanner with element IDs
    init(scannerContainerId = 'reader', startButtonId = 'start-scanner', stopButtonId = 'stop-scanner') {
        this.scannerContainer = document.getElementById(scannerContainerId);
        this.startButton = document.getElementById(startButtonId);
        this.stopButton = document.getElementById(stopButtonId);

        if (!this.scannerContainer) {
            console.error('Scanner container not found:', scannerContainerId);
            return;
        }

        if (this.startButton) {
            this.startButton.addEventListener('click', () => this.startScanner());
        }

        if (this.stopButton) {
            this.stopButton.addEventListener('click', () => this.stopScanner());
        }

        console.log('Ticket Scanner initialized');
    }

    // Set current ticket barcode for validation
    setCurrentTicket(barcode) {
        this.currentTicketBarcode = barcode;
        console.log('Current ticket set:', barcode);
    }

    // Start QR code scanner
    async startScanner() {
        if (this.isScanning) {
            console.log('Scanner is already running');
            return;
        }

        try {
            // Check if HTML5QRCode is available
            if (typeof Html5Qrcode === 'undefined') {
                throw new Error('HTML5 QR Code library not loaded');
            }

            const cameras = await Html5Qrcode.getCameras();

            if (!cameras || cameras.length === 0) {
                this.showNotification('error', 'Tidak ada kamera yang ditemukan!');
                return;
            }

            // Create scanner instance
            this.html5QrCode = new Html5Qrcode(this.scannerContainer.id);

            // Update UI
            this.updateScannerUI(true);

            // Start scanning
            await this.html5QrCode.start(
                cameras[0].id, // Use first available camera
                {
                    fps: 10,
                    qrbox: { width: 250, height: 250 },
                    aspectRatio: 1.0
                },
                (decodedText) => {
                    this.handleScannedCode(decodedText);
                },
                (errorMessage) => {
                    // Ignore most errors during scanning
                    if (!errorMessage.includes('NotFoundException')) {
                        console.log('Scan error:', errorMessage);
                    }
                }
            );

            this.isScanning = true;
            this.scannerActive = true;
            console.log('QR Scanner started successfully');

        } catch (error) {
            console.error('Error starting scanner:', error);
            this.showNotification('error', 'Error mengakses kamera: ' + error.message);
            this.stopScanner();
        }
    }

    // Stop QR code scanner
    async stopScanner() {
        if (this.html5QrCode && this.isScanning) {
            try {
                await this.html5QrCode.stop();
                this.html5QrCode.clear();
                this.isScanning = false;
                this.scannerActive = false;

                // Update UI
                this.updateScannerUI(false);

                console.log('QR Scanner stopped successfully');
            } catch (error) {
                console.error('Error stopping scanner:', error);
            }
        }
    }

    // Update scanner UI based on state
    updateScannerUI(isScanning) {
        if (this.startButton && this.stopButton) {
            if (isScanning) {
                this.startButton.classList.add('hidden');
                this.stopButton.classList.remove('hidden');
            } else {
                this.startButton.classList.remove('hidden');
                this.stopButton.classList.add('hidden');
            }
        }
    }

    // Handle scanned QR code
    handleScannedCode(decodedText) {
        console.log('QR Code scanned:', decodedText);

        try {
            const qrData = JSON.parse(decodedText);

            if (!qrData.barcode) {
                this.showNotification('error', 'QR code tidak valid!');
                return;
            }

            // Validate if scanned ticket matches current ticket
            if (this.currentTicketBarcode && qrData.barcode !== this.currentTicketBarcode) {
                this.showNotification('error', 'QR code tidak sesuai dengan tiket ini!');
                return;
            }

            this.validateTicket(qrData.barcode);

        } catch (error) {
            // If JSON parsing fails, try direct barcode scanning
            console.log('QR code is not JSON, trying direct barcode:', decodedText);

            if (this.currentTicketBarcode && decodedText !== this.currentTicketBarcode) {
                this.showNotification('error', 'QR code tidak sesuai dengan tiket ini!');
                return;
            }

            this.validateTicket(decodedText);
        }
    }

    // Validate ticket with server
    async validateTicket(barcode) {
        try {
            this.showNotification('info', 'Memvalidasi tiket...');

            const response = await fetch(`/tickets/scan/${barcode}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': this.getCsrfToken(),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            if (data.success) {
                this.showNotification('success', data.message);

                // Stop scanner on successful validation
                setTimeout(() => {
                    this.stopScanner();

                    // Close modal and reload page after delay
                    const modal = document.getElementById('ticket-modal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }

                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);

                }, 2000);
            } else {
                this.showNotification('error', data.message);
            }

        } catch (error) {
            console.error('Validation error:', error);
            this.showNotification('error', 'Terjadi kesalahan saat memvalidasi tiket');
        }
    }

    // Get CSRF token from meta tag
    getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    }

    // Show notification
    showNotification(type, message) {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.ticket-scanner-notification');
        existingNotifications.forEach(notification => notification.remove());

        // Create new notification
        const notification = document.createElement('div');
        notification.className = `ticket-scanner-notification fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transition-all duration-300 transform translate-x-full`;

        const styles = {
            success: 'bg-green-500 text-white',
            error: 'bg-red-500 text-white',
            info: 'bg-blue-500 text-white',
            warning: 'bg-yellow-500 text-white'
        };

        notification.className += ` ${styles[type] || styles.info}`;

        notification.innerHTML = `
            <div class="flex items-center">
                <i data-lucide="${this.getNotificationIcon(type)}" class="w-5 h-5 mr-2"></i>
                <span class="font-medium">${message}</span>
            </div>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
            notification.classList.add('translate-x-0');
        }, 100);

        // Re-initialize Lucide icons if available
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // Remove notification after 5 seconds
        setTimeout(() => {
            notification.classList.remove('translate-x-0');
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Get appropriate icon for notification type
    getNotificationIcon(type) {
        const icons = {
            success: 'check-circle',
            error: 'alert-circle',
            info: 'info',
            warning: 'alert-triangle'
        };
        return icons[type] || 'info';
    }

    // Check if scanner is available
    isScannerAvailable() {
        return typeof Html5Qrcode !== 'undefined' &&
               'getCameras' in Html5Qrcode &&
               typeof navigator.mediaDevices !== 'undefined';
    }

    // Manual ticket validation (for testing)
    async validateManualBarcode(barcode) {
        if (!barcode) {
            this.showNotification('error', 'Kode tiket tidak valid');
            return;
        }
        this.validateTicket(barcode);
    }

    // Cleanup resources
    destroy() {
        this.stopScanner();
        if (this.html5QrCode) {
            this.html5QrCode.clear();
            this.html5QrCode = null;
        }
        this.isScanning = false;
        this.scannerActive = false;
    }
}

// Initialize global scanner instance
window.ticketScanner = new TicketScanner();

// Auto-initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Check if scanner elements exist on the page
    const hasScannerContainer = document.getElementById('reader') !== null;
    const hasStartButton = document.getElementById('start-scanner') !== null;

    if (hasScannerContainer && hasStartButton) {
        window.ticketScanner.init();

        // Check scanner availability
        if (!window.ticketScanner.isScannerAvailable()) {
            console.warn('QR Scanner not available on this device/browser');
            const startButton = document.getElementById('start-scanner');
            if (startButton) {
                startButton.disabled = true;
                startButton.innerHTML = '<i data-lucide="camera-off" class="w-4 h-4 mr-2"></i>Scanner Tidak Tersedia';

                // Re-initialize Lucide icons
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }
        }
    }
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TicketScanner;
}
