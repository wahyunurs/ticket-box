<!-- Add Ticket Modal -->
<dialog id="add_ticket_modal" class="modal">
    <form method="POST" action="{{ route('admin.tickets.store') }}" class="modal-box">
        @csrf

        <h3 class="text-lg font-bold mb-4">Tambah Ticket</h3>

        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Tipe Ticket</span>
            </label>
            <select name="tipe" class="select select-bordered w-full" required>
                <option value="" disabled selected>Pilih Tipe Ticket</option>
                <option value="reguler">Regular</option>
                <option value="premium">Premium</option>
            </select>
        </div>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Harga</span>
            </label>
            <input type="number" name="harga" placeholder="Contoh: 50000" class="input input-bordered w-full"
                required />
        </div>
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text font-semibold">Stok</span>
            </label>
            <input type="number" name="stok" placeholder="Contoh: 100" class="input input-bordered w-full"
                required />
        </div>
        <div class="modal-action">
            <button class="btn btn-primary" type="submit">Tambah</button>
            <button class="btn" onclick="add_ticket_modal.close()" type="reset">Batal</button>
        </div>
    </form>
</dialog>
