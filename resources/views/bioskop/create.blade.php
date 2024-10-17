@extends('templates.app', ['title' => 'Tambah film || Apotek'])

@section('content-dinamis')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('bioskop.add.store') }}" method="POST">
                @csrf
                @if (Session::get('failed'))
                <div class="alert alert-danger my-2"> {{Session::get('failed')}}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Nama film</label>
                    <div class="col-md-8">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label">Tipe film</label>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-select">
                            <option hidden selected disabled>Pilih</option>
                            <option value="animasi" {{ old('type') == 'animasi' ? 'selected' : ''}}>Animasi</option>
                            <option value="dokumenter" {{ old('type') == 'dokumenter' ? 'selected' : ''}}>Dokumenter</option>
                            <option value="keluarga" {{ old('type') == 'keluarga' ? 'selected' : ''}}>Keluarga</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Harga tiket</label>
                    <div class="col-md-8">
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-md-4 col-form-label">Stock</label>
                    <div class="col-md-8">
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-block btn-success">Kirim Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
