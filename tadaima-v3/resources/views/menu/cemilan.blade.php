@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="font-size: 2.8rem; font-weight: bold;">Cemilan</h2>

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

@include('components.whatsapp-button')

@endsection

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    /* Card style */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 28px rgba(0, 0, 0, 0.15);
    }

    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 3px;
    }

    .pagination li a, .pagination li span {
        position: relative;
        display: block;
        padding: 8px 14px;
        font-size: 16px;
        color: #000;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination li a:hover {
        background-color: #6b0000; 
        color: #fff;
    }

    .pagination .active span {
        background-color: #6b0000; 
        border-color: #6b0000;
        color: #fff;
    }

    .pagination .disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
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
