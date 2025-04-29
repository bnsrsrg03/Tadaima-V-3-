@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="font-size: 2.8rem; font-weight: bold;">Makanan</h2>

    <div class="row justify-content-center">
    @foreach ($menus as $menu)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5" data-aos="fade-up">
    <div class="card shadow-lg position-relative" 
         style="width: 357px; height: 452.06px; border-radius: 20px; overflow: hidden;">
         
        {{-- Kalau bestseller, tampilkan label best seller --}}
        @if ($menu->bestseller)
            <img src="{{ asset('assets/images/bestseller.png') }}" alt="Best Seller" class="best-seller-badge">
        @endif

        <img src="{{ asset('storage/' . $menu->image) }}" 
             alt="{{ $menu->name }}" 
             class="card-img-top" 
             style="height: 300px; width: 100%; object-fit: cover;">
             
        <div class="card-body text-center d-flex flex-column justify-content-center" 
             style="height: 152.06px;">
            <h4 class="card-title mb-3" style="font-weight: 700;">{{ $menu->name }}</h4>
            <p class="card-text text-muted mb-4" style="font-size: 1.3rem;">
                Rp{{ number_format($menu->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
</div>

@endforeach

    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $menus->links('pagination::bootstrap-5') }}
    </div>
</div>
@include('components.whatsapp-button')
@endsection

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 28px rgba(0, 0, 0, 0.15);
    }
</style>



@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>


@endsection
