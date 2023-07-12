@extends('layouts.main')
@section('content')
<div class="content-wrapper d-flex justify-content-center align-items-center">
    <div class="card" style="width: 56rem;">
        <img src="{{asset('image/logo.png')}}" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="text-bold">Selamat Datang Di Website Kursusku</h5>
            <p class="card-text">Kursusku memudahkan anda dalam mengeksplorasi pembelajaran-pembelajaran yang menarik, Disini materi ada banyak materi mulai dari pemrograman,  jaringan, multimedia, dll. Apapun yang ingin anda pelajari disusun secara lengkap dan tepat</p>
            <a href="{{route('course')}}" class="btn btn-outline-success">Ayo Buat Kursusmu!</a>
        </div>
    </div>
</div>
@endsection