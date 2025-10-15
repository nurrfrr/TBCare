@extends('layout')

@section('title', 'CariKlinik')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class="container my-5">

    <h2 class="fw-bold text-success text-center mb-4">Cari Klinik TBC Terdekat</h2>

    <!-- MAP CONTAINER -->
    <div class="card shadow-sm border-0 p-3 mb-4" style="height: 450px;">
        <div id="map" style="width: 100%; height: 100%; border-radius: 12px;"></div>
    </div>

    <!-- LIST KLINIK -->
    <div class="card shadow-sm border-0 p-4">
        <h5 class="fw-bold text-success mb-3">Daftar Klinik Terdekat</h5>

        <div id="clinic-list" class="list-group">
            {{-- Contoh Klinik Dummy --}}
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div>
                    <strong>Klinik Sehat Mandiri</strong><br>
                    <small>2.3 km • ⭐ 4.7 • 08:00 - 20:00</small><br>
                    <small>📞 0812-8899-221</small>
                </div>
                <button class="btn btn-outline-success btn-sm">Lihat Rute</button>
            </a>

            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div>
                    <strong>Klinik Harapan Sehat</strong><br>
                    <small>3.1 km • ⭐ 4.5 • 09:00 - 21:00</small><br>
                    <small>📞 0821-3321-776</small>
                </div>
                <button class="btn btn-outline-success btn-sm">Lihat Rute</button>
            </a>
        </div>
    </div>
</div>

<!-- Google Maps API Script -->
<script>
    function initMap() {
        // Lokasi default (Jakarta atau nanti ambil posisi user dengan geolocation)
        const defaultLocation = { lat: -6.200000, lng: 106.816666 };

        // Buat map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: defaultLocation,
        });

        // Temporary marker (dummy klinik)
        new google.maps.Marker({
            position: defaultLocation,
            map: map,
            title: "Klinik Sehat Mandiri"
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&callback=initMap"></script>
@endsection
