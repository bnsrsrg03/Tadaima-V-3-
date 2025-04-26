@extends('layouts.app') {{-- Pastikan kamu punya layouts.app --}}

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">Makanan</h2>
    <div class="row justify-content-center">
        @foreach ($menus as $menu)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        @if($menu->bestseller)
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">BEST SELLER</span>
                        @endif
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text text-danger fw-bold">Rp{{ number_format($menu->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@section('styles')
    <style>
        .card {
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.5em 0.75em;
            border-radius: 12px;
            font-weight: bold;
        }

        .card-body h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1.1rem;
        }

        .container h2 {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
@endsection

@endsection
