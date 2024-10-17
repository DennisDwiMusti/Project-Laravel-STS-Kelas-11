@extends('templates.app', ['title' => 'Landing || Apotek'])
<!-- extends : memanggil file blade biasanya untuk template, pemanggillanya : folder.file -->

@section('content-dinamis')
<!-- section : mengisi html ke yield yang ada di file extends -->
<h1 class="mt-3 text-center">Selamat Datang, {{ Auth::user()->name }}</h1>
<h4 class="text-center">Kami Menyediakan Layanan Memesan Tiket Bioskop</h4><br><br>
<div class="text-center">
    <h4 class=" text-center">Silahkan Memilih Film Yang Ingin Anda Tonton</h4>
    <div class="card">
        <label for="name" class="col-md-4 col-form-label">
            <h5 class="text-center">
                Perang Dunia 2
                <img src="https://cdn.slidesharecdn.com/ss_thumbnails/wwii-coldwar-130513084334-phpapp02-thumbnail.jpg?width=640&height=640&fit=bounds" width="400px" height="200px">
                <br>
            <h5>
        </label>
    </div>
</div>
@endSection
