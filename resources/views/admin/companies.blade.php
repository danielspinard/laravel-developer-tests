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
                Company list
            </div>

            @component('components.table')
                @slot('thead')
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Website</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Action</th>
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
                            <td class="text-center">
                                <button
                                    type="button"
                                    id="delete-company"
                                    data-company={{ $company->id }}
                                    class="btn btn-sm btn-danger"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
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
