@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Galeri Taman Safari</h1>

    <div class="row">
        {{-- contoh gambar --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/gallery/singa.jpg') }}" class="card-img-top" alt="Singa">
                <div class="card-body text-center">
                    <h5 class="card-title">Singa</h5>
                    <p class="card-text">Penghuni hutan rimba yang gagah.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/gallery/gajah.jpg') }}" class="card-img-top" alt="Gajah">
                <div class="card-body text-center">
                    <h5 class="card-title">Gajah</h5>
                    <p class="card-text">Raksasa lembut dari Asia.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/gallery/zebra.jpg') }}" class="card-img-top" alt="Zebra">
                <div class="card-body text-center">
                    <h5 class="card-title">Zebra</h5>
                    <p class="card-text">Kuda belang khas Afrika.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
