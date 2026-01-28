<!-- Ticket List Section -->
<div class="mt-10">
    <div class="flex">
        <h1 class="text-3xl font-semibold mb-4">List Ticket</h1>
        <button onclick="add_ticket_modal.showModal()" class="btn btn-primary ml-auto">Tambah Ticket</button>
    </div>
    <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="w-1/3">tipe</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $index => $ticket)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $ticket->tipe }}</td>
                        <td>{{ $ticket->harga }}</td>
                        <td>{{ $ticket->stok }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary mr-2" onclick="openEditModal(this)"
                                data-id="{{ $ticket->id }}" data-tipe="{{ $ticket->tipe }}"
                                data-harga="{{ $ticket->harga }}" data-stok="{{ $ticket->stok }}">Edit</button>
                            <button class="btn btn-sm bg-red-500 text-white" onclick="openDeleteModal(this)"
                                data-id="{{ $ticket->id }}">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada ticket tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
