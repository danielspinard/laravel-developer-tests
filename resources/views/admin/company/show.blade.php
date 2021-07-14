@extends('layout.app')

@section('content')
<div class="py-4"></div>

<div class="card">
    <div class="card-header">
        Companies
    </div>

    <div class="card-body">
        <a href="{{ route('company.create') }}" class="btn btn-primary">
            Create new Company
        </a>

        <div class="card mt-3">
            <div class="card-header">
                Company info
            </div>

            <div class="card-body">
                @component('components.form')
                    @slot('route', null)
                    @slot('method', null)
                    @slot('name', $company->name)
                    @slot('email', $company->email)
                    @slot('address', $company->address)
                    @slot('website', $company->website)
                @endcomponent
            </div>

        </div>

        <div class="card mt-3">
            <div class="card-header">
                Employees list ({{ $employees->count() }})
            </div>
        </div>
    </div>
</div>

<div class="py-4"></div>
@endsection

@push('style')
    <style>
        a {
            text-decoration: none;
        }

        .card-header {
            background-color: #fff;
            padding: 12px 15px;
        }
    </style>
@endpush
