@extends('layouts.app')

@section('content')
<div class="py-3"></div>

<div class="container">
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
    
                @component('components.table')
                    @slot('thead')
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Contracted at</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    @endslot
    
                    @slot('tbody')
                        @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <a
                                        class="text-dark"
                                        href=""
                                    >
                                        {{ $employee->full_name }}
                                    </a>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->contracted_at }}</td>
                                <td class="text-center">
                                    <button
                                        type="button"
                                        id="delete-company"
                                        data-employee={{ $employee->id }}
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
</div>
@endsection
