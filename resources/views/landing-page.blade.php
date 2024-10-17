@extends('templates.app', ['title' => 'Landing || Apotek'])
<!-- extends : memanggil file blade biasanya untuk template, pemanggillanya : folder.file -->

@section('content-dinamis')
<!-- section : mengisi html ke yield yang ada di file extends -->
<h1 class="mt-3 text-center">Selamat Datang, {{ Auth::user()->name }}</h1>
<h4 class="text-center">Kami Menyediakan Layanan Memesan Tiket Bioskop</h4><br><br>
<div class="text-center">
    <h4 class=" text-center">Silahkan Memilih Film Yang Ingin Anda Tonton</h4>

    <main>

        <header class="site-header site-menu-header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 mx-auto">
                        <h1 class="text-white">Our Menus</h1>

                        <strong class="text-white">Perfect for all Breakfast, Lunch and Dinner</strong>
                    </div>

                </div>
            </div>

            <div class="overlay"></div>
        </header>

        <section class="menu section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4 card">Top Film Keluarga</h2>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01ga0jmqhs5rwgdkmqk1gfc0e5.jpg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Mencuri Raden Saleh</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>35.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">128 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjHBZLqtveEd5bu83bl943wbQguz3wdssE26ZzNA_-gy5DEgYs4_gehAVHRe0bis2qlUiLzPDuG6USlzYD2KjRa-czWpxJk0W0aGaXj-0RpA9vc4WhRhJD9aF-3t4Z_PhJEwPTCJ2bWn2bh/s1600/Screenshot_2019-01-06-23-02-39-993_com.instagram.android-01.jpeg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Keluarga Cemara</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>25.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">64 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="assets/images/Sherina.jpg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Petualangan Sherina 2</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>25.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">3/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">32 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <br><br>

        <section class="menu section-padding bg-white">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4 card">Top Film Animasi Saat Ini</h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/112/MTA-98572980/no-brand_poster-anime-attack-on-titan-aot-custom-gambar-dekorasi-kamar_full01.jpg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Attack on Titan</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>30.000</span>

                                <del class="ms-4"><small>Rp.</small>50.000</del>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4.2/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">66 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://cloud.jpnn.com/photo/arsip/normal/2024/06/04/falcon-pictures-merilis-poster-resmi-film-animasi-si-juki-th-6mh8.jpg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Si Juki The Movie</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>50.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4.6/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">84 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <br><br>

        <section class="menu section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4 card">Top Film Dokumenter Saat Ini</h2>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://gilangpnp.wordpress.com/wp-content/uploads/2020/03/000..jpg?w=700" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">The Ottomans</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp</small>25.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">102 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://asset-2.tstatic.net/papuabarat/foto/bank/images/Film-Hacksaw-Ridge.jpg" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Hacksaw Ridge</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>45.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">3/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">56 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="menu-thumb">
                            <img src="https://i0.wp.com/mariviu.com/wp-content/uploads/2023/08/poster-film-Oppenheimer-jpg.webp?fit=1280%2C720&ssl=1" class="img-fluid menu-image" alt="">

                            <div class="menu-info d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Oppenheimer</h4>

                                <span class="price-tag bg-white shadow-lg ms-4"><small>Rp.</small>35.000</span>

                                <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                    <h6 class="reviews-text mb-0 me-3">4.8/5</h6>

                                    <div class="reviews-stars">
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star-fill reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                        <i class="bi-star reviews-icon"></i>
                                    </div>

                                    <p class="reviews-text mb-0 ms-4">76 Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

</div>
@endSection
