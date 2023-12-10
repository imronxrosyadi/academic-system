@extends('layouts.private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6 mb-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <main class="form-master">
                    <form action="/subject" method="post">
                        @csrf
                        <div class="form">
                            <label for="code">Kode Mata Pelajaran</label>
                            <input type="text" name="code" class="form-control rounded-top  @error('code') is-invalid @enderror" id="code" placeholder="Kode Mata Pelajaran" required value="{{ old('code') }}">
                            @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="name">Nama Mata Pelajaran</label>
                            <input type="text" name="name" class="form-control rounded-top  @error('name') is-invalid @enderror" id="name" placeholder="Nama Mata Pelajaran" required value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="time_allocation_in_week">Jangka Waktu</label>
                            <input type="text" name="time_allocation_in_week" class="form-control rounded-top  @error('time_allocation_in_week') is-invalid @enderror" id="time_allocation_in_week" placeholder="Jangka Waktu Dalam Minggu" required value="{{ old('time_allocation_in_week') }}">
                            @error('time_allocation_in_week')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" class="form-control rounded-top  @error('semester') is-invalid @enderror" id="semester" placeholder="Semester" required value="{{ old('semester') }}">
                            @error('semester')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col text-right">
                            <a href="/subject" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Simpan</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
