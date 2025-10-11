{{-- resources/views/admin/rewards/modals/reject-modal.blade.php --}}
<div id="rejectModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 p-4 modal-overlay">
    <div class="bg-white rounded-2xl max-w-md w-full transform scale-95 transition-transform duration-300">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center">
                    <i data-lucide="x-circle" class="w-6 h-6 text-red-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Tolak Penukaran</h3>
                    <p class="text-gray-600 text-sm">Anda yakin ingin menolak penukaran ini?</p>
                </div>
            </div>

            <form action="{{ route('admin.rewards.reject') }}" method="POST">
                @csrf
                <input type="hidden" name="redemption_id" id="reject_redemption_id">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan <span class="text-red-500">*</span></label>
                    <textarea name="admin_notes" rows="3" required
                              class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300"
                              placeholder="Berikan alasan penolakan..."></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeModal('rejectModal')"
                            class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex-1 px-4 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-300 flex items-center justify-center gap-2">
                        <i data-lucide="x" class="w-4 h-4"></i>
                        Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showRejectModal(redemptionId) {
        const modal = document.getElementById('rejectModal');
        document.getElementById('reject_redemption_id').value = redemptionId;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
</script>
