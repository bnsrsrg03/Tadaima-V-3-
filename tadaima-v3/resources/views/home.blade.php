@extends('layouts.app')

@section('content')
<main>

    {{-- Hero Section --}}
    <section class="hero text-center relative">
        <img src="{{ asset('assets/images/2.jpg') }}" alt="Tadaima Ramen and Coffee" class="w-full h-96 object-cover">
        <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 text-white">
            <h1 class="text-5xl font-bold brand-title">TADAIMA</h1>
            <p class="text-xl">Ramen and Coffee</p>
        </div>
    </section>

    {{-- About Section --}}
    <section class="about bg-white py-12">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-4 gap-8">
            <img src="{{ asset('assets/images/2.jpg') }}" alt="Ramen" class="w-full md:w-1/2 rounded-xl shadow-lg">
            <div class="text md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
                <p class="text-gray-700 mb-4">
                    Tadaima Ramen and Coffee merupakan rumah makan yang didirikan sejak 2023 dengan nuansa Jepang di Kecamatan Balige, Sumatera Utara.
                </p>
                <a href="{{ route('halaman.tentang') }}" class="btn bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </section>

    {{-- Menu Terlaris Section --}}
   

</main>
@endsection
