@extends('layouts.app')

@section('content')

<!-- Sejarah -->
<section class="sejarah-singkat">
  <div class="container">
    <h2 class="judul-sejarah">
      Sejarah Singkat Berdirinya Rumah Makan Tadaima
      <span class="underline"></span>
    </h2>
    <div class="konten-sejarah">
      <div class="gambar">
        <img src="/assets/images/sejarah2.jpg" alt="Logo Tadaima">
      </div>
      <div class="teks">
        <p>
        Tadaima Ramen and Coffee merupakan salah satu rumah makan yang terletak di Jl. Gereja 3C, Balige, Sumatera Utara yang didirikan pada tahun 2023 dan masih memiliki 1 cabang. Tadaima Ramen and Coffee menawarkan menu makanan dengan khas ramen. Nama 'Tadaima' sendiri diambil dari bahasa Jepang yang berarti “Aku Pulang”, sebuah filosofi orang Jepang yang biasanya diucapkan saat seseorang kembali ke rumah. Dengan filosofi tersebut, Tadaima berharap setiap pengunjung bisa merasakan suasana yang hangat dan akrab seperti di rumah sendiri saat menikmati makanan di sini. 
        Tadaima Ramen and Coffee menyediakan berbagai pilihan menu seperti ramen, dessert, kopi, ice cream, dan beberapa menu lokal lainnya seperti nasi snack. Tadaima Ramen and Coffee menawarkan pengalaman kuliner yang berbeda bagi para pecinta makanan.
        </p>
        <p>
        Tholhas Tampubolon, pendiri Tadaima Ramen and Coffee melihat perkembangan industri kuliner, pariwisata, dan pembangunan di Balige mulai berkembang pesat. Bapak Tholhas sendiri memiliki ide untuk mendirikan sebuah rumah makan sebagai usaha bisnis kuliner pertamanya di Balige dengan nuansa yang berbeda.
         Tadaima sendiri bukan menjadi nama pertama.
        </p>
      </div>
    </div>
  </div>
</section>


@include('components.alasan')


<!-- karyawan -->
<section class="tim-kami overflow-hidden py-10">
  <div class="container mx-auto">
    <h2 style="font-size: 40px;" class="text-center font-bold mb-10 text-black drop-shadow-lg">
      Profil Karyawan
    </h2>
    <div class="overflow-hidden relative w-full">
  <div class="flex animate-scroll gap-4 w-max">
    @foreach ($karyawans as $karyawan)
      <div class="flex flex-col items-center flex-shrink-0 w-[310px]">
        <div class="overflow-hidden">
          <img src="{{ asset('storage/' . ($karyawan->image ?? 'images/default.jpg')) }}"
               alt="{{ $karyawan->name }}" class="img-karyawan">
        </div>
        <p class="mt-2 text-[20px] text-center text-black font-medium truncate w-full">
          {{ $karyawan->name }}
        </p>
        <p class="text-center text-gray-600 text-sm truncate w-full">{{ $karyawan->position }}</p>
      </div>
    @endforeach

    @foreach ($karyawans as $karyawan)
      <div class="flex flex-col items-center flex-shrink-0 w-[310px]">
        <div class="overflow-hidden">
          <img src="{{ asset('storage/' . ($karyawan->image ?? 'images/default.jpg')) }}"
               alt="{{ $karyawan->name }}" class="img-karyawan">
        </div>
        <p class="mt-2 text-xs text-center text-black font-medium truncate w-full">
          {{ $karyawan->name }}
        </p>
        <p class="text-center text-gray-600 text-sm truncate w-full"> {{ $karyawan->position }}</p>
      </div>
    @endforeach
  </div>
</div>
</div>
  </div>
</section>

<style>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll {
  animation: scroll 25s linear infinite;
  width: max-content;
  display: flex;
}
</style>



<!-- Galeri -->
<section class="galeri bg-white/60 backdrop-blur-sm shadow-lg rounded-xl text-black" 
         data-aos="fade-left" data-aos-duration="1000">
  <div class="container text-center">
    <h2 class="text-3xl font-bold mb-5" style="font-size: 40px; font-weight: bold; font-family: 'Inter', sans-serif; text-shadow: 0 2px 6px rgba(0,0,0,0.6);">
      Galeri
    </h2>
    <div class="swiper galeriSwiper position-relative">
      <div class="swiper-wrapper">
      @foreach ($galeris as $index => $galeri)
  <div class="swiper-slide d-flex justify-content-center">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
         style="max-width: 1068px; width: 1068px; height: 600px;">
      @if ($index === 0)
        <video autoplay muted loop
               style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
          <source src="{{ asset('assets/images/vidio.mp4') }}" type="video/mp4">
          Browser Anda tidak mendukung tag video.
        </video>
      @else
        <img src="{{ asset('storage/' . $galeri->image) }}" alt="Galeri"
             class="img-fluid"
             style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
      @endif
    </div>
  </div>
@endforeach
      </div>
      <div class="swiper-button-prev custom-nav" style="left: 10px; z-index: 10;"></div>
      <div class="swiper-button-next custom-nav" style="right: 10px; z-index: 10;"></div>
    </div>
  </div>
</section>


<!-- Jam Operasional -->
<section class="jam-operasional" style="background-color: #b30000; padding: 20px 0;">
  <div class="container text-center">
    <h4 class="text-white font-bold mb-1">Jam Operasional</h4>
    <p class="text-white mb-0">
      @foreach ($jamOperasional as $jam)
        {{ $jam->day }} : {{ \Carbon\Carbon::parse($jam->open_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($jam->close_time)->format('H:i') }}
        @if (!$loop->last)<br>@endif
      @endforeach
    </p>
  </div>
</section>



<!-- Peta Lokasi -->
<section class="lokasi" data-aos="fade-up">
  <div class="overflow-hidden rounded-xl" style="height: 600px;">   
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1335.7281160913742!2d99.06247881566183!3d2.3332667096019355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e055e68f70a19%3A0x2fd966f88a685ae!2sTadaima%20Ramen%20and%20Coffee!5e0!3m2!1sid!2sid!4v1745198210015!5m2!1sid!2sid"
      width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
  </div>
</section>

@include('components.whatsapp-button')

<!-- AOS Init -->
<script>
  AOS.init({ once: true });
</script>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  var swiper = new Swiper(".galeriSwiper", {
    slidesPerView: 1,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,
    grabCursor: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: { slidesPerView: 1 },
      992: { slidesPerView: 1 }
    }
  });
</script>


<style>
  .swiper-slide .card:hover img {
    transform: scale(1.05);
  }
  .custom-nav {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, rgb(179, 33, 0), rgb(179, 33, 0));
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
    background: linear-gradient(135deg, rgb(179, 33, 0), rgba(255, 0, 0, 0.61));
    transform: scale(1.1);
  }
  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 20px;
    font-weight: bold;
  }
</style>
<button id="scrollToTopBtn"
  class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full border-2 border-red-600 text-red-600 bg-transparent hover:bg-red-600 hover:text-white flex items-center justify-center transition duration-300"
  aria-label="Kembali ke atas">
  <i class="fas fa-chevron-up" style="font-size: 27px;"></i>
</button>

<!-- Script Scroll to Top -->
<script>
  const btn = document.getElementById("scrollToTopBtn");
  window.onscroll = () => {
    btn.style.display = (window.scrollY > 300) ? "flex" : "none";
  };
  btn.onclick = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
</script>

@endsection
