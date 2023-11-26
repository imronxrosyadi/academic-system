@extends('layouts.private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6 mb-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
            </div>
            <div class="card-body">
                <main class="form-master">
                    <form action="/student" method="post">
                        @csrf
                        <div class="form">
                            <label for="id_number">NIK</label>
                            <input type="text" name="id_number" class="form-control rounded-top  @error('id_number') is-invalid @enderror" id="id_number" placeholder="NIK" required value="{{ old('id_number') }}">
                            @error('id_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" class="form-control rounded-top  @error('nisn') is-invalid @enderror" id="nisn" placeholder="NISN" required value="{{ old('nisn') }}">
                            @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control rounded-top  @error('full_name') is-invalid @enderror" id="full_name" placeholder="Nama Lengkap" required value="{{ old('full_name') }}">
                            @error('full_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="nickname">Nama Panggilan</label>
                            <input type="text" name="nickname" class="form-control rounded-top  @error('nickname') is-invalid @enderror" id="nickname" placeholder="Nama Panggilan" required value="{{ old('nickname') }}">
                            @error('nickname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="gender">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-laki" checked>
                                <label class="form-check-label" for="laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" name="birth_place" class="form-control rounded-top  @error('birth_place') is-invalid @enderror" id="birth_place" placeholder="Tempat Lahir" required value="{{ old('birth_place') }}">
                            @error('birth_place')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="form-control rounded-top  @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Tanggal Lahir" required value="{{ old('birth_date') }}">
                            @error('birth_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="religion">Agama</label>
                            <select class="form-select" aria-label="religion" name="religion" id="religion" style="color: grey">
                                <option selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                            @error('religion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="phone_number">Nomor Telepon</label>
                            <input type="text" name="phone_number" class="form-control rounded-top  @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Nomor Telepon" required value="{{ old('phone_number') }}">
                            @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="address">Alamat</label>
                            <textarea type="text" name="address" class="form-control rounded-top  @error('address') is-invalid @enderror" id="address" placeholder="Alamat" required>{{ old('address') }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col text-right">
                            <a href="/student" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Simpan</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
