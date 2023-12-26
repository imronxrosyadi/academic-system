@extends('layouts.private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-6 mb-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <main class="form-master">
                    <form action="{{ route('subject-grade.update', $subjectGrade->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Equivalent to... -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" value="{{ $subjectGrade->id }}" />
                        <div class="form">
                            <input id="type" name="type" value={{ $type }} hidden>
{{--                            <input id="student_id" name="student_id" value={{ $subjectGrade->students->id }} hidden>--}}
                            <label for="student_id">Nama Siswa</label>
                            <select disabled class="form-select  @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                                <option selected value={{ $subjectGrade->students->id }}>{{ $subjectGrade->students->full_name }}</option>
                            </select>
                            @error('student_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="subject_id">Mata Pelajaran</label>
                            <select disabled class="form-select  @error('subject_id') is-invalid @enderror" id="subject_id" name="subject_id">
                                <option selected required value="{{ old('subject_id') }}">{{ $subjectGrade->subjects->name }}</option>
                            </select>
                            @error('subject_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="grade">Nilai</label>
                            <input type="text" name="grade" class="form-control rounded-top  @error('grade') is-invalid @enderror" id="grade" placeholder="Nilai" required value="{{ old('grade', $subjectGrade->grade) }}">
                            @error('grade')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col text-right">
                            <a href="/subject-grade/{{$type}}/@if($type === 'student') {{$subjectGrade->students->id}} @elseif($type === 'subject') {{$subjectGrade->subjects->id}} @endif" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Simpan</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
