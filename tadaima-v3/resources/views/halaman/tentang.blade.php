@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f0f0f0;
        color: #333;
    }

    section {
        padding: 60px 0;
    }

    .container {
        width: 90%;
        max-width: 1140px;
        margin: auto;
    }

    .tentang-kami h2,
    .tim-kami h2,
    .galeri h2 {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .tentang-kami p {
        text-align: justify;
        line-height: 1.8;
    }

    .tim-kami .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .tim-kami .card:hover {
        transform: translateY(-5px);
    }

    .tim-kami .card-img-top {
        height: 300px;
        object-fit: cover;
        border-bottom: 2px solid #eee;
    }

    .galeri .card {
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .galeri .card img {
        height: 250px;
        object-fit: cover;
    }

    .jam-operasional {
        background-color: #b22222;
        color: white;
        text-align: center;
        padding: 30px 0;
    }

    .jam-operasional h3 {
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .jam-operasional table {
        background-color: white;
        color: black;
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
    }

    .lokasi .map-container {
        width: 100%;
        height: 400px;
        margin-top: 20px;
        border-radius: 15px;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .tentang-kami h2,
        .galeri h2,
        .tim-kami h2,
        .jam-operasional h3 {
            font-size: 1.5rem;
        }
    }
</style>

<!-- Sejarah Rumah Makan -->
<section class="tentang-kami">
    <div class="container">
        <h2>Sejarah Singkat Berdirinya Rumah Makan Tadaima</h2>
        <p>
            Tadaima Ramen and Coffee merupakan salah satu rumah makan khas Jepang yang terletak di Jl. Gereja 3C, Balige, Sumatera Utara, Indonesia.
            Berdiri sejak tahun 2023, rumah makan ini menawarkan berbagai jenis ramen autentik dan kopi spesial yang menggugah selera.
        </p>
        <p>
            Dengan konsep interior yang mengusung budaya Jepang, Tadaima Ramen and Coffee menciptakan suasana yang nyaman dan cocok untuk berkumpul bersama keluarga maupun teman-teman.
            Selain itu, berbagai pilihan menu lainnya seperti rice bowl dan makanan ringan khas Jepang juga tersedia untuk melengkapi pengalaman kuliner pelanggan.
        </p>
        <p>
            Kami berkomitmen untuk selalu memberikan pelayanan terbaik dan menghadirkan hidangan berkualitas dengan cita rasa yang autentik.
            Nikmati pengalaman bersantap yang berbeda di Tadaima Ramen and Coffee!
        </p>
    </div>
</section>

<!-- Profil Karyawan -->
<section class="tim-kami py-5 bg-light">
    <div class="container">
        <h2>Tim Kami</h2>
        <div class="row justify-content-center">
            @foreach ($karyawans as $karyawan)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        @if ($karyawan->image)
                            <img src="{{ asset('storage/' . $karyawan->image) }}" class="card-img-top" alt="{{ $karyawan->name }}">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="default">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $karyawan->name }}</h5>
                            <p class="card-text">{{ $karyawan->position }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Galeri -->
<section class="galeri">
    <div class="container">
        <h2>Galeri</h2>
        <div class="row">
            @foreach ($galeris as $galeri)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('assets/image/galeri/' . $galeri->image) }}" class="card-img-top" alt="Galeri">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $galeri->judul }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Jam Operasional -->
<section class="jam-operasional">
    <div class="container">
        <h3>Jam Operasional</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jamOperasional as $jam)
                    <tr>
                        <td>{{ $jam->day }}</td>
                        <td>{{ \Carbon\Carbon::parse($jam->open_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($jam->close_time)->format('H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- Peta Lokasi -->
<section class="lokasi">
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1335.7281160913742!2d99.06247881566183!3d2.3332667096019355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e055e68f70a19%3A0x2fd966f88a685ae!2sTadaima%20Ramen%20and%20Coffee!5e0!3m2!1sid!2sid!4v1745198210015!5m2!1sid!2sid"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

@endsection
