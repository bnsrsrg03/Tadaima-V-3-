@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Ulasan</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf
        <div>
            <label for="comment">Tulis Ulasan:</label><br>
            <textarea name="comment" id="comment" rows="3" style="width: 100%">{{ old('comment') }}</textarea>
            @error('comment')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Kirim</button>
    </form>

    <hr>

@endsection
