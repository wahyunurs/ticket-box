<!-- Edit Ticket Modal -->
<dialog id="edit_ticket_modal" class="modal">
    <form method="POST" class="modal-box">
        @csrf
        @method('PUT')

        <input type="hidden" name="ticket_id" id="edit_ticket_id">

        <h3 class="text-lg font-bold mb-4">Edit Ticket</h3>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Tipe Ticket</span>
            </label>
            <select name="tipe" id="edit_tipe" class="select select-bordered w-full" required>
                <option value="" disabled selected>Pilih Tipe Ticket</option>
                <option value="reguler">Regular</option>
                <option value="premium">Premium</option>
            </select>
        </div>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Harga</span>
            </label>
            <input type="number" name="harga" id="edit_harga" placeholder="Contoh: 50000"
                class="input input-bordered w-full" required />
        </div>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Stok</span>
            </label>
            <input type="number" name="stok" id="edit_stok" placeholder="Contoh: 100"
                class="input input-bordered w-full" required />
        </div>
        <div class="modal-action">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn" onclick="edit_ticket_modal.close()" type="reset">Batal</button>
        </div>
    </form>
</dialog>
