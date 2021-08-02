@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ __('Employee') }}
        </div>

        <div class="card-body">
            <a href="{{ route('company.index') }}" class="btn btn-primary">
                {{ __('Back to company list') }}
            </a>

            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Employee info') }}
                </div>

                <div class="card-body">
                    @component('components.employee.form')
                        @slot('method', '')
                        @slot('route', '')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
