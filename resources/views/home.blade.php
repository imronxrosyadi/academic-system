@extends('layouts/home')

@section('container')
<div class="row justify-content-center text-light">
    <div class="col-md-8 d-flex align-items-center mb-5 mt-5">
        <div class="row text-center justify-content-center">
            <img src="{{ asset('img/logo-annida-nobg.png') }}" alt="Annida Ul Hasanah" style="width: 200px; height: 200px">
            <h1><b>Annida Ul Hasanah</b></h1>
            <h5>Sistem Informasi Nilai Pelajaran</h5>
            <a type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3 mr-5">Tentang</a>
            <a href="/login" type="button" class="btn btn-outline-light rounded-pill d-grid gap-2 col-4 mt-3">Masuk</a>
        </div>
    </div>
</div>
@endsection
@section('about')
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <img src="img/ahp.png" alt="ahp" style=" width: 750px; ">
        </div>
        <div class="col-md-5 d-flex align-items-center">
            <div class="row">
                <h1><b>Sistem Informasi Annida Ul Hasanah</b></h1>
                <h5>
                    Annida Ul Hasanah memperkenalkan sistem informasi terkini yang dirancang secara eksklusif untuk penginputan nilai mata pelajaran. Sistem ini memberikan solusi efektif bagi staff berkepentingan, seperti guru dan staf administrasi, untuk melakukan penilaian secara mudah dan efisien. Melalui antarmuka yang aman dan terbatas aksesnya, hanya staff yang memiliki wewenang yang dapat menginput nilai siswa ke dalam sistem.
                    <br>
                    <br>
                    Dengan implementasi sistem ini, proses penginputan nilai menjadi lebih terstruktur dan terotomatisasi, menghemat waktu serta mengurangi potensi kesalahan manusiawi. Secara keseluruhan, sistem ini memberikan kontribusi signifikan terhadap efisiensi administrasi sekolah, sambil memastikan keamanan dan keterbatasan akses yang ketat sesuai dengan kebutuhan instansi Annida Ul Hasanah.
                </h5>
            </div>
        </div>
    </div>
@endsection
