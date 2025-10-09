{{-- resources/views/admin/rewards/modals/detail-modal.blade.php --}}
<div id="detailModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 modal-overlay">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden transform scale-95 transition-transform duration-300">
        <div class="relative p-8">
            <button onclick="closeModal('detailModal')" class="absolute top-4 right-4 p-2 text-gray-400 hover:text-gray-600 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div id="modalContent">
                {{-- Content akan diisi via AJAX --}}
            </div>
        </div>
    </div>
</div>

<script>
    function showRedemptionDetail(redemptionId) {
        const modal = document.getElementById('detailModal');
        const content = document.getElementById('modalContent');

        // Show loading
        content.innerHTML = `
            <div class="text-center py-12">
                <i data-lucide="loader" class="w-8 h-8 animate-spin mx-auto mb-4 text-green-600"></i>
                <p class="text-gray-600">Memuat detail penukaran...</p>
            </div>
        `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Load content via AJAX
        fetch(`/admin/rewards/redemptions/${redemptionId}`, {
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            content.innerHTML = data.html;
            // Reinitialize Lucide icons in modal
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        })
        .catch(error => {
            content.innerHTML = `
                <div class="text-center py-8">
                    <i data-lucide="alert-circle" class="w-12 h-12 mx-auto mb-4 text-red-600"></i>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Terjadi Kesalahan</h3>
                    <p class="text-gray-600">Gagal memuat detail penukaran.</p>
                </div>
            `;
        });
    }
</script>
