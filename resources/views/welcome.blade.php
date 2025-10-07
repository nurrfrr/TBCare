@extends('layout')

@section('title', 'Home')

@section('content')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<!-- 🔹 HERO SECTION / JUMBOTRON -->
<div class="bg-light py-5 text-center" style="width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw;">
    <div class="container py-5">
        <h1 class="display-5 fw-bold mb-4">
            Kenali, Atasi, dan Cegah <span class="text-primary">TBC</span> Bersama
        </h1>
        <p class="text-center fst-italic text-muted fs-5 mx-auto col-lg-8">
            Platform ini membantu masyarakat menemukan layanan kesehatan terdekat, 
            mendapatkan edukasi seputar TBC, serta melaporkan kondisi TBC dengan mudah. 
            <br><br>
            Bersama kita bisa melawan TBC dan meningkatkan kualitas hidup.
        </p>
    </div>
</div>

<!-- 🔹 DESCRIPTION SECTION -->
<!-- <div class="container my-4">
     <p class="text-center fst-italic text-muted fs-5 mx-auto col-lg-8">
        Platform ini membantu masyarakat menemukan layanan kesehatan terdekat, 
        mendapatkan edukasi seputar TBC, serta melaporkan kondisi TBC dengan mudah. 
        <br><br>
        Bersama kita bisa melawan TBC dan meningkatkan kualitas hidup.
    </p> -->
<!-- </div> -->

<!-- 🔹 SECTION TITLE -->
<h2 class="text-center mt-5 fw-bold">Mulai Langkahmu</h2>
<p class="text-center text-muted mb-5">Eksplor fitur yang bisa kamu gunakan</p>

<!-- 🔹 FEATURES SECTION (Cards) -->
<div class="container">
    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{asset('img/BelajarTBC.jpeg')}}" class="card-img-top" alt="Belajar TBC">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">BelajarTBC</h5>
                    <p class="card-text">Edukasi tentang gejala, pencegahan, dan pengobatan TBC secara interaktif.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{asset('img/MonitorTBC.jpg')}}" class="card-img-top" alt="Monitor TBC">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">MonitorTBC</h5>
                    <p class="card-text">Lacak kondisi kesehatanmu dengan analisis dan grafik yang informatif.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{asset('img/CariKlinik.jpg')}}" class="card-img-top" alt="Cari Klinik">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-primary">CariKlinik</h5>
                    <p class="card-text">Temukan puskesmas atau klinik TBC terdekat dengan cepat dan mudah.</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
