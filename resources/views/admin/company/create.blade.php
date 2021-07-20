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

@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
