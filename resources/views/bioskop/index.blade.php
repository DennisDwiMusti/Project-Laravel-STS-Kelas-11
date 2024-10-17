@extends('templates.app', ['title' => 'film || Apotek'])

@section('content-dinamis')
<div class="d-block mx-auto my-5">
    <a href="{{ route('bioskop.add') }}" class="btn btn-success mb-3">+ Tambah</a>
    <!-- mengambil pesan yang dikirim controller lewat with -->
    @if (Session::get('success'))
        <div class="alert alert-success my-2"> {{Session::get('success')}}</div>
    @endif
    <table class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama film</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if (@count($bioskop) > 0)
        <!-- $bioskop sumbernya/namanya dari compact -->
        @foreach ($bioskop as $index => $item)
        <tr>
            <!-- <td>{{$bioskop->firstItem() + $index}}</td> -->
            <td>{{$bioskop->currentPage() * $bioskop->perPage() - $bioskop->perPage() + $index + 1}}</td>
            <!-- $item['nama_field_migration'] -->
            <td>{{$item['name']}}</td>
            <td>{{$item['type']}}</td>
            <td>Rp. {{number_format($item['price'], 0, ',' , '.')}}</td>
            <!-- ternary : kalau stock <= 3 muncul warna merah, else putih -->
            <td class="{{ $item['stock'] <= 3 ? 'bg-danger text-white' : 'bg-white text-black' }}" onclick="editStock('{{$item->id}}', {{$item->stock}})"><span style="cursor: pointer; text-decoration: underline;">{{$item['stock']}}</span></td>
            <td class="d-flex justify-content-center py-1">
                <a href="{{ route('bioskop.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                <button class="btn btn-danger" onclick="showModal('{{$item->id}}', '{{$item->name}}')">Hapus</button>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5" class="text-bold">Data film Kosong</td>
        </tr>
        @endif
    </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <!-- links() : menampilkan button pagination digunakan hanya ketika di controllernya pake paginate() atau simplePaginate() -->
            {{$bioskop->links()}}
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-delete-film" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data film</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Ingin Menghapus Film <span id="nama-film"></span> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- save changes dibuat type ="submit" agar form di modal bisa dijalanin action -->
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editStockModal" tabindex="-1" aria-labelledby="editStockLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-edit-stock" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStockLabel">Edit Stok</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="bioskop-id">
                        <div class="form-group">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Fungsi untuk menampilkan modal
    function showModal(id, name) {
        // isi untuk action form
        let action = '{{ route('bioskop.delete', ':id') }}';
        action = action.replace(':id', id);
        // buat attribute action pada form
        $('#form-delete-film').attr('action', action);
        // Munculkan modal yang idnya exampleMOdal
        $('#exampleModal').modal('show');
        // InnerText pada element html id nama-film
        console.log(name);
        $('#nama-film').text(name);
    }

    // Fungsi buat nampilin model edit stock sama masukin nilai stock yang mau diedit
    function editStock(id, stock) {
        $('#bioskop-id').val(id);
        $('#stock').val(stock);
        $('#editStockModal').modal('show');
    }
    // Event Listener buat handle submit form edit secara ajax
    $('#form-edit-stock').on('submit', function(e) {
        // Biar form gak ke-submit dengan cara biasa (refresh halaman)
        e.preventDefault();
        // ambil id film dari input hidden
        let id = $('#bioskop-id').val();
        // ambil stok baru yang diinput user
        let stock = $('#stock').val();
        // Bikin Url buat update stock dengan metode PUT
        let actionurl = '{{ url("bioskop/update-stock") }}/' + id;
        // Kirim request Ajax buat update stock
        $.ajax({
            url: actionurl, // URL tujuan buat update stock
            type: 'PUT', // Gunakan Metode PUT buat update data
            data: {
                _token: '{{ csrf_token() }}', // token csrf biar aman
                stock: stock // data stock baru yang mau dikirim ke server
            },
            success: function(response) {
                // Tutup modal kalau update berhasil
                $('#modal-edit-stock').modal('hide');
                // refresh halaman biar perubahan stock kelihatan
                alert('Berhasil Update Stok')
                location.reload();
    },
    error: function(err) {
        // Kasih alert kalau ada error pas update stock
        alert(err.responseJSON.failed);
    }});
    });
</script>
@endpush
