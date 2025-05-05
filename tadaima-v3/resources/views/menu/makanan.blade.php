@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="font-size: 2.8rem; font-weight: bold;">Makanan</h2>

    <div class="row justify-content-center">
    @foreach ($menus as $menu)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5" data-aos="fade-up">
    <div class="card shadow-lg position-relative card-hover" 
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

<style>
.card-hover {
    transition: transform 0.3s ease-in-out;
}

.card-hover:hover {
    transform: scale(1.05);
}
</style>


    <div class="d-flex justify-content-center mt-4">
        {{ $menus->links('pagination::bootstrap-5') }}
    </div>
</div>

<div class="container py-5 text-center bg-light rounded shadow-sm">
    <h1 class="text-3xl font-bold">Info Pemesanan</h1>
    <p class="mt-2 text-muted">Informasi pemesanan paket di Rempah Wangi</p>

    <div class="row mt-5">
        <!-- Pemesanan -->
        <div class="col-md-4 mb-4">
            <div class="mb-3" style="font-size: 2rem;">📞</div>
            <h4 class="fw-bold">Pemesanan</h4>
            <p class="mt-2">Jl. RS. Fatmawati Raya No.29,<br>
                RT.8/RW.3, Cilandak Bar., Kec. Cilandak,<br>
                Kota Jakarta Selatan, DKI Jakarta 12430</p>
            <p class="mt-2">WhatsApp: +6281806608888</p>
            <p class="mt-2">Senin - Sabtu<br>Fast Response Chat 10.00 - 20.00</p>
        </div>

        <!-- Pengiriman -->
        <div class="col-md-4 mb-4">
            <div class="mb-3" style="font-size: 2rem;">📦</div>
            <h4 class="fw-bold">Pengiriman</h4>
            <p class="mt-2">Pemesanan sebaiknya dilakukan H-2 untuk jadwal pengiriman.</p>
            <p class="mt-2">Jam pengiriman disesuaikan dengan permintaan customer.</p>
        </div>

        <!-- Pembayaran -->
        <div class="col-md-4 mb-4">
            <div class="mb-3" style="font-size: 2rem;">💵</div>
            <h4 class="fw-bold">Pembayaran</h4>
            <p class="mt-2">Cash On Delivery atau transfer.</p>
            <p class="mt-2">Transfer harus lunas sebelum pengiriman.<br>
                Bukti transfer diserahkan saat serah terima barang.</p>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Pembatalan -->
        <div class="col-md-6 mb-4">
            <div class="mb-3" style="font-size: 2rem;">❌</div>
            <h4 class="fw-bold">Pembatalan</h4>
            <p class="mt-2">Batal atau ubah pesanan via telepon saat jam layanan.<br>
                Tidak berlaku di hari-H.</p>
            <p class="mt-2">Konfirmasi final dilakukan H-1 via telepon.</p>
        </div>

        <!-- Harga & Biaya -->
        <div class="col-md-6 mb-4">
            <div class="mb-3" style="font-size: 2rem;">🏷️</div>
            <h4 class="fw-bold">Harga & Biaya</h4>
            <p class="mt-2">Harga dapat berubah sesuai kebijakan manajemen, termasuk pajak.</p>
            <p class="mt-2">Pemotongan pajak dan materai ditanggung pemesan.</p>
        </div>
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
