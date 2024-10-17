@extends('templates.app', ['title' => 'Edit Akun || Apotek'])

@section('content-dinamis')
<!-- action route mengirim $item ['id'] untuk spesifikasi data di route path {id} -->
 @if (Session::get('failed'))
 <div class="alert alert-danger">{{Session::get('failed')}} </div>
 @endif
<form action ="{{ route('user.edit.update', $user ['id']) }}" method ="POST">
    @csrf
    <!-- path : http method route untuk ubah data -->
    @method('PATCH')
    <div class="d-flex">
        <label for="" class="col-md-4 col-form-label">Nama Pengguna</label>
        <input type ="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
    </div>
    <!-- jika ada error validasi berhubungan dengan name, tampilkan dibawah input name text merah -->
        @error('name')
        <small class ="text-danger">{{ $message }}</small>
        @enderror
    <div class="flex">
        <label for="role" class="col-md-4 col-form-label">Tipe Akun</label>
        <select name="role" id="role" class="col-md-4 col-form-label">
            <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : ''}}>Admin</option>
            <option value="kasir" {{ $user['role'] == 'kasir' ? 'selected' : ''}}>Kasir</option>
        </select>
    </div>
    @error('type')
    <small class ="text-danger">{{ $message }}</small>
    @enderror
    <div class="d-flex">
        <label for="email" class="col-md-4 col-form-label">Email</label>
        <input type ="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
    </div>
    @error('email')
    <small class ="text-danger">{{ $message }}</small>
    @enderror
    <div class="d-flex">
        <label for="password" class="col-md-4 col-form-label">Password</label>
        <input type ="password" class="form-control" id="password" name="password" value="{{ $user['password'] }}">
    </div>
    @error('password')
    <small class ="text-danger">{{ $message }}</small>
    @enderror
    <button type ="submit" class="btn btn-primary">Ubah Data</button>
</form>
@endsection
