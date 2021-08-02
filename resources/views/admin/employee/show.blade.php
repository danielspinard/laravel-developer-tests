@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ __('Employee') }}
        </div>

        <div class="card-body">
            <a href="{{ route('company.show', ['id' => $employee->company_id]) }}" class="btn btn-primary">
                {{ __('Back to company') }}
            </a>

            <button id="delete-employee" data-action="" class="btn btn-danger">
                {{ __('Delete employee') }}
            </button>

            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Employee info') }}
                </div>

                <div class="card-body">
                    @component('components.employee.form')
                        @slot('method', '')
                        @slot('route', '')
                        @slot('employee', $employee)
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
