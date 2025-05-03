@extends('layouts.app')

@section('content')
<style>
    .ulasan-container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #e5e5e5;
        padding: 30px;
        border-radius: 10px;
        font-family: Arial, sans-serif;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .form-ulasan {
        background-color: white;
        border: 2px solid #333;
        border-radius: 8px;
        padding: 10px;
        display: flex;
        align-items: center;
        position: relative;
        margin-bottom: 20px;
    }

    textarea {
        flex-grow: 1;
        border: none;
        padding: 10px;
        font-size: 16px;
        resize: none;
        min-height: 100px;
        border-radius: 8px;
        outline: none;
    }

    .btn-submit {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: transparent;
        border: none;
        font-size: 22px;
        cursor: pointer;
        color: #333;
    }

    .btn-submit::after {
        content: "\27A4"; 
    }

    .alert-success {
        color: green;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .alert-error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .desc-ulasan {
        font-size: 15px;
        color: #333;
        margin-top: 20px;
    }

    .ulasan-list {
        margin-top: 30px;
    }

    .ulasan-item {
        display: flex;
        align-items: flex-start;
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .avatar {
        width: 40px;
        height: 40px;
        background-color: #000;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
        margin-right: 15px;
    }

    .ulasan-content {
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 10px 15px;
    }

    .whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: bold;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: background-color 0.3s;
    }

    .whatsapp-button:hover {
        background-color: #1ebe5d;
    }
</style>

<div class="ulasan-container">
    <h1>Ulasan</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ulasan.store') }}" method="POST" class="form-ulasan">
        @csrf
        <textarea name="comment" id="comment" placeholder="Masukkan ulasan">{{ old('comment') }}</textarea>
        @error('comment')
            <div class="alert-error">{{ $message }}</div>
        @enderror

        <button type="button" class="btn-submit" onclick="showConfirmModal()"></button>

    </form>

    <p class="desc-ulasan">
        Ulasan anda sangat penting untuk membangun kepercayaan pengunjung lain, mengumpulkan masukan berharga,
        serta memperbaiki layanan dan kualitas kami berdasarkan feedback yang anda berikan.
    </p>

    <div class="ulasan-list">
        @foreach($ulasans as $ulasan)
            <div class="ulasan-item">
                <div class="avatar">
                    {{ strtoupper(substr($ulasan->user->name ?? $ulasan->nama ?? 'A', 0, 1)) }}
                </div>
                <div class="ulasan-content">
                    <strong>{{ $ulasan->user->name ?? $ulasan->nama ?? 'Anonim' }}</strong><br>
                    {{ $ulasan->comment }}
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('components.whatsapp-button')

<!-- Modal Konfirmasi -->
<div id="reviewModal" style="display: none; position: fixed; top: 0; left: 0; 
    width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); 
    align-items: center; justify-content: center; z-index: 9999;">
    <div style="background-color: white; padding: 30px; border-radius: 20px; width: 300px; text-align: center;">
        <p style="margin-bottom: 20px;">
            Setelah mengirim ulasan, ulasan Anda akan ditampilkan secara permanen dan tidak dapat dihapus atau diedit, kecuali oleh admin yang mengelolanya
        </p>
        <div style="display: flex; justify-content: space-between;">
            <button onclick="closeModal()" style="padding: 10px 20px; border: none; background: #eee; border-radius: 10px;">Kembali</button>
            <button onclick="submitForm()" style="padding: 10px 20px; background-color: #2BB5F9; color: white; border: none; border-radius: 10px;">Kirim ulasan</button>
        </div>
    </div>
</div>

<script>
    const form = document.querySelector('.form-ulasan');
    const modal = document.getElementById('reviewModal');

    let shouldSubmit = false;

    form.addEventListener('submit', function(e) {
        if (!shouldSubmit) {
            e.preventDefault(); // Tahan submit
            modal.style.display = 'flex';
        }
    });

    function closeModal() {
        modal.style.display = 'flex';
    }

    function submitForm() {
        shouldSubmit = true;
        form.submit();
    }
</script>



@endsection
