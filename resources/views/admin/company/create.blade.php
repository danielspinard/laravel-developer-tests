@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
    <div class="card">
        <div class="card-header">
            Companies
        </div>

        <div class="card-body">
            <a href="{{ route('company.index') }}" class="btn btn-primary">
                Back to company list
            </a>

            <div class="card mt-3">
                <div class="card-header">
                    Company info
                </div>

                <div class="card-body">
                    @component('components.form')
                        @slot('route', route('company.store'))
                        @slot('method', 'post')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/swal.css') }}">    
@endpush

@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $("form").submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                enctype: 'multipart/form-data',
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: (response) => {
                    return swal({
                        title: "Company created.",
                        text: "New company has been created",
                        icon: "success",
                        button: false,
                        timer: 1850,
                    });
                },
                error: function (response) {
                    let error = response.responseJSON;
                    let errors = '';

                    $.each(error, function (attribute, value) {
                        if($.isPlainObject(value)) {
                            $.each(value, function (input, error) {
                                errors = errors + error + "\n";
                            });
                        }
                    });

                    return swal({
                        title: error.message,
                        text: errors,
                        icon: "error",
                        button: false,
                        timer: 3500,
                    });
                }
            });
        });
    </script>
@endpush
