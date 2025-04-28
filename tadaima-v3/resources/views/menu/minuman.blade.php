@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="font-size: 2.8rem; font-weight: bold;">Minuman</h2>

    <div class="row justify-content-center">
        @foreach ($menus as $menu)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-5" data-aos="fade-up">
                <div class="card h-100 shadow-lg" style="border-radius: 20px;">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="card-img-top" style="height: 300px; object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title mb-3" style="font-weight: 700;">{{ $menu->name }}</h4>
                        <p class="card-text text-muted mb-4" style="font-size: 1.3rem;">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $menus->links('pagination::bootstrap-5') }}
    </div>
</div>
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
