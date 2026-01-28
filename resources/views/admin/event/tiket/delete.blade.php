<!-- Delete Ticket Modal -->
<dialog id="delete_modal" class="modal">
    <form method="POST" class="modal-box">
        @csrf
        @method('DELETE')

        <input type="hidden" name="ticket_id" id="delete_ticket_id">

        <h3 class="text-lg font-bold mb-4">Hapus Ticket</h3>
        <p>Apakah Anda yakin ingin menghapus ticket ini?</p>
        <div class="modal-action">
            <button class="btn btn-primary" type="submit">Hapus</button>
            <button class="btn" onclick="delete_modal.close()" type="reset">Batal</button>
        </div>
    </form>
</dialog>
