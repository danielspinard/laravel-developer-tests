@extends('layout.app')

@section('content')
<div class="py-4"></div>

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

<div class="py-4"></div>
@endsection

@push('style')
    <style>
        .card-header {
            background-color: #fff;
            padding: 12px 15px;
        }
    </style>
@endpush
