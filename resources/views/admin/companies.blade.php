@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ __('Companies') }}
        </div>

        <div class="card-body">
            <a href="{{ route('company.create') }}" class="btn btn-primary">
                {{ __('Create new Company') }}
            </a>

            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Company list') }}
                </div>

                @component('components.table')
                    @slot('thead')
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Address') }}</th>
                            <th scope="col">{{ __('Website') }}</th>
                            <th scope="col">{{ __('E-mail') }}</th>
                        </tr>
                    @endslot

                    @slot('tbody')
                        @foreach($companies as $company)
                            <tr>
                                <td>
                                    <a
                                        class="text-dark"
                                        href="{{ route('company.show', ['id' => $company->id]) }}"
                                    >
                                        {{ $company->name }}
                                    </a>
                                </td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->email }}</td>
                            </tr>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection

