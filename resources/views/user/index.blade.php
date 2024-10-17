@extends('templates.app', ['title' => 'Kelola Akun || Apotek'])

@section('content-dinamis')
    <div class="d-block mx-auto my-5">
        <a href="{{ route('user.add') }}" class="btn btn-success mb-3">+ Tambah</a>
        <!-- mengambil pesan yang dikirim controller lewat with -->
        @if (Session::get('success'))
            <div class="alert alert-success my-2"> {{ Session::get('success') }}</div>
        @endif
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @if (@count($user) > 0)
                    <!-- $user sumbernya/namanya dari compact -->
                    @foreach ($user as $index => $item)
                        <tr>
                            <!-- <td>{{ $user->firstItem() + $index }}</td> -->
                            <td>{{ $user->currentPage() * $user->perPage() - $user->perPage() + $index + 1 }}</td>
                            <!-- $item['nama_field_migration'] -->
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['role'] }}</td>
                            <td class="d-flex justify-content-center py-1">
                                <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger"
                                    onclick="showModal('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-bold">Data user Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <!-- links() : menampilkan button pagination digunakan hanya ketika di controllernya pake paginate() atau simplePaginate() -->
            {{ $user->links() }}
        </div>
        <!-- Modal -->
        <div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-delete-user" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="showUserLabel">Hapus Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Ingin Menghapus Data User <span id="nama-User"></span> ?
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

@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showModal(id, name) {
            let action = '{{ route('user.delete', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-user').attr('action', action);
            $('#showUserModal').modal('show');
            console.log(name);
            $('#nama-user').text(name);
        }
    </script>
@endpush
