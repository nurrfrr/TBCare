@extends('layout')

@section('title', 'About')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container my-5">
    <h2 class="text-center fw-bold mb-5">Tentang Kami</h2>

    <!-- 🔹 Card 1 (kiri) -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-10 mx-auto">
            <div class="about-card">
                <h4 class="fw-bold text-primary">Profil Website</h4>
                <p class="text-muted mb-0">
                    Website ini merupakan platform digital yang dirancang untuk membantu masyarakat mengenali,
                    mencegah, dan mengatasi penyakit TBC dengan lebih mudah. Kami menyediakan berbagai fitur seperti edukasi kesehatan,
                    pelacakan kondisi, dan pencarian layanan kesehatan terdekat.
                </p>
            </div>
        </div>
    </div>

    <!-- 🔹 Card 2 (kanan) -->
    <div class="row mb-5 align-items-center flex-md-row-reverse">
        <div class="col-md-10 mx-auto">
            <div class="about-card text-end">
                <h4 class="fw-bold text-primary">Visi Kami</h4>
                <p class="text-muted mb-0">
                    Menjadi platform digital terpercaya dalam meningkatkan kesadaran dan pencegahan penyakit TBC di Indonesia.
                    Kami berkomitmen untuk membantu menciptakan masyarakat yang sehat dan bebas dari TBC melalui edukasi dan teknologi.
                </p>
            </div>
        </div>
    </div>

    <!-- 🔹 Card 3 (kiri) -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-10 mx-auto">
            <div class="about-card">
                <h4 class="fw-bold text-primary">Misi Kami</h4>
                <p class="text-muted mb-0">
                    Kami berupaya memberikan akses informasi yang mudah dan cepat mengenai TBC, menyediakan
                    sarana pelaporan kondisi kesehatan, serta menghubungkan pengguna dengan fasilitas medis terdekat.
                    Misi kami adalah menjadikan masyarakat lebih sadar akan pentingnya deteksi dini dan pengobatan TBC.
                </p>
            </div>
        </div>
    </div>

    <!-- 🔹 Card 4 (kanan) -->
    <div class="row mb-5 align-items-center flex-md-row-reverse">
        <div class="col-md-10 mx-auto">
            <div class="about-card text-end">
                <h4 class="fw-bold text-primary">Nilai Utama</h4>
                <p class="text-muted mb-0">
                    Kami menjunjung nilai kolaborasi, empati, dan tanggung jawab sosial.
                    Dengan mengedepankan transparansi dan teknologi yang humanis, kami ingin menjadi bagian dari perubahan positif
                    menuju Indonesia yang lebih sehat dan peduli terhadap kesehatan masyarakat.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
