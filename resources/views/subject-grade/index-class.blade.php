@extends('layouts/private')

@section('container')
    <div class="row justify-content-center">


        @if(session()->has('success') && session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('err') && session()->get('err'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('err') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-10">
            <div class="row mb-3">
                <div class="col-lg-12 text-center">
                    <h1>Nilai Mata Pelajaran</h1>
                </div>
            </div>
            <div class="card mb-4">
                <div class="row justify-content-center p-5">
                    <h3>Silahkan Pilih Semester</h3>
                    <div class="list-group">
                        @foreach($clazzs as $class)
                            <a href="/subject-grade/class/{{$class->id}}/{{$class->semester}}" class="list-group-item list-group-item-action">Semester {{ $class->semester }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div>
                <a href="/subject-grade" class="w-30 mt-3"><- Back</a>
            </div>
        </div>
    </div>

    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript_content')
    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            console.log('ini bro', href);
            $.ajax({
                url: href
                , beforeSend: function () {
                    // $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function () {
                    // $('#loader').hide();
                }
                , error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    // $('#loader').hide();
                }
                , timeout: 8000
            })
        });
    </script>

    <script>
        // display a modal (small modal)
        $(document).on('click', '#cancelButton', function (event) {
            event.preventDefault();
            $('#smallModal').modal("hide");
            $('#smallBody').html(result).hide();
        });
    </script>
@endsection
