@extends('layouts.app') {{-- Pastikan kamu punya layouts.app --}}

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">Cemilan</h2>
    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-md-4 mb-4">
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
@endsection
