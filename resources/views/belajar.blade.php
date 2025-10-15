@extends('layout')

@section('title', 'Belajar TBC')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container my-5">

  <!-- ====================== CAROUSEL: Apa itu TBC + Penularan ====================== -->
  <div id="tbcCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="display-5 fw-bold text-success">Apa Itu TBC?</h2>
            <p class="text-muted">
              Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri <em>Mycobacterium tuberculosis</em>.
              Penyakit ini menyerang paru-paru, namun dapat menyebar ke organ lain seperti tulang, otak, atau kelenjar getah bening.
            </p>
          </div>
          <div class="col-md-6 text-center">
            <img src="{{ asset('img/tbc-apa-itu-1.jpg') }}" class="img-fluid rounded-4 shadow" alt="TBC Illustration">
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="row align-items-center flex-md-row-reverse">
          <div class="col-md-6">
            <h2 class="display-5 fw-bold text-success">Bagaimana TBC Menular?</h2>
            <p class="text-muted">
              Penularan TBC terjadi melalui percikan udara saat penderita batuk, bersin, atau berbicara. Bakteri akan masuk ke paru-paru orang lain dan berkembang jika sistem imun lemah.
            </p>
          </div>
          <div class="col-md-6 text-center">
            <img src="{{ asset('img/TBCnular.jpeg') }}" class="img-fluid rounded-4 shadow" alt="Penularan TBC">
          </div>
        </div>
      </div>

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#tbcCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#tbcCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- ====================== GEJALA TBC – SLIDE CARDS ====================== -->
  <h2 class="display-6 fw-bold text-success mb-3">Gejala TBC</h2>
  <div class="scroll-card-container d-flex overflow-auto gap-3 pb-3">
    <!-- Card Example -->
    <div class="mini-card shadow-sm">
      <img src="{{ asset('img/longcough.jpg') }}" class="img-fluid rounded-top" alt="Batuk Lama">
      <div class="p-2 text-center fw-semibold">Batuk lebih dari 2 minggu</div>
    </div>
    <div class="mini-card shadow-sm">
      <img src="{{ asset('img/fever.jpg') }}" class="img-fluid rounded-top" alt="Demam">
      <div class="p-2 text-center fw-semibold">Demam tanpa sebab jelas</div>
    </div>
    <div class="mini-card shadow-sm">
      <img src="{{ asset('img/lossweight.jpeg') }}" class="img-fluid rounded-top" alt="Turun Berat">
      <div class="p-2 text-center fw-semibold">Penurunan berat badan</div>
    </div>
    <div class="mini-card shadow-sm">
      <img src="{{ asset('img/nightsweat.jpg') }}" class="img-fluid rounded-top" alt="Keringat">
      <div class="p-2 text-center fw-semibold">Berkeringat di malam hari</div>
    </div>
  </div>

  <!-- ====================== PENCEGAHAN TBC ====================== -->
  <div class="row my-5">
    <div class="col-md-4">
      <h2 class="display-6 fw-bold text-success">Pencegahan TBC</h2>
    </div>
    <div class="col-md-8 d-flex flex-wrap gap-3">
      @for ($i = 1; $i <= 5; $i++)
        <div class="prevent-card shadow-sm p-3 rounded-4 text-center">
          <div class="icon-circle mb-2">🛡️</div>
          <p class="mb-0">Tips Pencegahan {{ $i }}</p>
        </div>
      @endfor
    </div>
  </div>

  <!-- ====================== PENGOBATAN TBC ====================== -->
  <div class="row my-5">
    <div class="col-md-8 d-flex flex-wrap gap-3 order-2 order-md-1">
      @for ($i = 1; $i <= 5; $i++)
        <div class="prevent-card shadow-sm p-3 rounded-4 text-center">
          <div class="icon-circle mb-2">💊</div>
          <p class="mb-0">Metode Pengobatan {{ $i }}</p>
        </div>
      @endfor
    </div>
    <div class="col-md-4 order-1 order-md-2">
      <h2 class="display-6 fw-bold text-success text-md-end">Pengobatan TBC</h2>
    </div>
  </div>

  <!-- ====================== MITOS VS FAKTA (COLLAPSE) ====================== -->
  <h2 class="display-6 fw-bold text-success mb-3">Mitos vs Fakta</h2>
  <button class="btn btn-outline-success mb-3" data-bs-toggle="collapse" data-bs-target="#mitosFakta">
    Lihat Detail
  </button>
  <div id="mitosFakta" class="collapse">
    <div class="card p-3 border-0 shadow-sm">
      <strong>Mitos: </strong>TBC hanya menyerang orang tua. <br>
      <strong>Fakta: </strong>TBC dapat menyerang semua usia, termasuk anak-anak.
    </div>
  </div>

  <!-- ====================== ARTIKEL ====================== -->
  <h2 class="display-6 fw-bold text-success my-4">Artikel Terkait</h2>
  <div class="row">
    @for ($i = 1; $i <= 6; $i++)
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm rounded-4 overflow-hidden">
          <img src="{{ asset('img/art1.jpg') }}" class="img-fluid" alt="Artikel">
          <div class="p-3">
            <h6 class="fw-bold">Artikel Edukasi {{ $i }}</h6>
            <p class="text-muted small">Ringkasan singkat tentang isi artikel edukasi ini...</p>
          </div>
        </div>
      </div>
    @endfor
  </div>

</div>

<!-- ====================== CHATBOT BUTTON + MODAL ====================== -->
<button class="chatbot-btn shadow-lg" data-bs-toggle="modal" data-bs-target="#chatModal">💬</button>

<div class="modal fade" id="chatModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-end">
    <div class="modal-content rounded-4">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Chat Bantuan TBC</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="3" placeholder="Tulis pertanyaan kamu..."></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success">Kirim</button>
      </div>
    </div>
  </div>
</div>

@endsection
