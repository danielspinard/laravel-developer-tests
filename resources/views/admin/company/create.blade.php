@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ __('Companies') }}
        </div>

        <div class="card-body">
            <a href="{{ route('company.index') }}" class="btn btn-primary">
                {{ __('Back to company list') }}
            </a>

            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Company info') }}
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
    <script src="{{ asset('js/helpers.js') }}"></script>
    
    <script>
        $("form").submit((event) => {
            event.preventDefault();

            ajaxStoreUpdateRequest(
                $("form"),
                "{{ route('company.index') }}"
            );
        });
    </script>
@endpush
