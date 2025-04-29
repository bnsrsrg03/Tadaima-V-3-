@extends('layouts.app')


@section('content')

<!-- Sejarah -->
<section class="py-32 px-6 md:px-20 bg-gray-100 shadow-lg rounded-xl overflow-hidden">
  <div class="container mx-auto max-w-4xl">
    <h2 
      class="text-4xl md:text-5xl font-bold text-gray-900 mb-8 text-center uppercase tracking-wide relative"
      data-aos="fade-down"
      data-aos-duration="800"
    >
      Sejarah Singkat Berdirinya Rumah Makan Tadaima
      <span class="absolute bottom-[-15px] left-1/2 transform -translate-x-1/2 w-20 h-1 bg-blue-500"></span>
    </h2>
    <p
      class="leading-relaxed mb-6 text-gray-700 text-center text-lg"
      data-aos="fade-down"
      data-aos-duration="800"
      data-aos-delay="200"
    >
      Tadaima Ramen and Coffee merupakan salah satu rumah makan khas Jepang yang terletak di Jl. Gereja 3C, Balige, Sumatera Utara, Indonesia.
      Berdiri sejak tahun 2023, rumah makan ini menawarkan berbagai jenis ramen autentik dan kopi spesial yang menggugah selera.
    </p>
    <p
      class="leading-relaxed mb-6 text-gray-700 text-center text-lg"
      data-aos="fade-down"
      data-aos-duration="800"
      data-aos-delay="400"
    >
      Dengan konsep interior yang mengusung budaya Jepang, Tadaima Ramen and Coffee menciptakan suasana yang nyaman dan cocok untuk berkumpul bersama keluarga maupun teman-teman.
      Selain itu, berbagai pilihan menu lainnya seperti rice bowl dan makanan ringan khas Jepang juga tersedia untuk melengkapi pengalaman kuliner pelanggan.
    </p>
    <p
      class="leading-relaxed text-gray-700 text-center text-lg"
      data-aos="fade-down"
      data-aos-duration="800"
      data-aos-delay="600"
    >
      Kami berkomitmen untuk selalu memberikan pelayanan terbaik dan menghadirkan hidangan berkualitas dengan cita rasa yang autentik.
      Nikmati pengalaman bersantap yang berbeda di Tadaima Ramen and Coffee!
    </p>
  </div>
</section>


<script>
  AOS.init({
    once: true 
  });
</script>

<!-- Profil Karyawan -->
<section class="tim-kami" data-aos="fade-right" data-aos-duration="1000">
  <div class="container">
    <h2>Profil Karyawan</h2>
    <div class="row justify-content-center">
      @foreach ($karyawans as $karyawan)
        <div class="col-karyawan mb-4">
          <div class="card text-center h-100">
            <img src="{{ asset('storage/' . ($karyawan->image ?? 'images/default.jpg')) }}"
                 class="card-img-top" alt="{{ $karyawan->name }}">
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
<section class="galeri py-5" style="background-color: #f2f2f2;" data-aos="fade-left" data-aos-duration="1000">
    <div class="container text-center">
        <h2 class="mb-3">Galeri</h2>
        <p class="mb-5">Temukan berbagai momen spesial kami yang diabadikan melalui galeri ini. 
        Setiap gambar adalah cerita tentang kelezatan dan kehangatan suasana!</p>

        <div class="swiper galeriSwiper position-relative">
            <div class="swiper-wrapper">
                @foreach ($galeris as $galeri)
                    <div class="swiper-slide d-flex justify-content-center">
                        <div class="card border-0 shadow-lg rounded-4" style="overflow:hidden; max-width: 400px;">
                            <img src="{{ asset('storage/' . $galeri->image) }}" alt="Galeri" class="img-fluid" style="transition: 0.5s;">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next custom-nav"></div>
            <div class="swiper-button-prev custom-nav"></div>
        </div>
    </div>
</section>

<script>
  AOS.init({
    once: true 
  });
</script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<style>
    .swiper-slide .card:hover img {
        transform: scale(1.05);
    }

    .custom-nav {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg,rgb(179, 33, 0),rgb(179, 33, 0));
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 20px;
        transition: 0.3s;
    }
    .custom-nav:hover {
        background: linear-gradient(135deg,rgb(179, 33, 0),rgba(255, 0, 0, 0.61));
        transform: scale(1.1);
    }
    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 20px;
        font-weight: bold;
    }
</style>

<!-- SwiperJS Config -->
<script>
    var swiper = new Swiper(".galeriSwiper", {
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 1,
            }
        }
    });
</script>

<!-- Jam Operasional -->
<section class="jam-operasional" style="background-color: #b30000; padding: 20px 0; margin-bottom: 0;">
    <div class="container text-center">
        <h4 class="text-white mb-1" style="font-weight: bold;">Jam Operasional</h4>
        <p class="text-white mb-0">
            @foreach ($jamOperasional as $jam)
                {{ $jam->day }} : {{ \Carbon\Carbon::parse($jam->open_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($jam->close_time)->format('H:i') }}
                @if (!$loop->last)
                    <br>
                @endif
            @endforeach
        </p>
    </div>
</section>


<!-- Peta Lokasi -->
<section class="lokasi pt-0 mt-0" style="margin-top: 0;" data-aos="fade-up">
  <div
    style="position: relative;
           width: 100%;
           height: 600px;
           overflow: hidden;
           border-radius: 12px;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1335.7281160913742!2d99.06247881566183!3d2.3332667096019355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e055e68f70a19%3A0x2fd966f88a685ae!2sTadaima%20Ramen%20and%20Coffee!5e0!3m2!1sid!2sid!4v1745198210015!5m2!1sid!2sid"
      width="100%" height="100%"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>



@include('components.whatsapp-button')

@endsection
