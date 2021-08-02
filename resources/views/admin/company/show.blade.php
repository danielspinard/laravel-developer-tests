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

            <button id="delete-company" data-action="{{ route('company.destroy', ['id' =>$company->id]) }}" class="btn btn-danger">
                {{ __('Delete company') }}
            </button>

            <a href="" class="btn btn-success">
                {{ __('Register employee') }}
            </a>
    
            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Company info') }}
                </div>
    
                <div class="card-body">
                    @component('components.company.form')
                        @slot('route')
                            {{ route('company.update', ['id' => $company->id]) }}
                        @endslot
                        @slot('method', 'patch')
                        @slot('company', $company)
                    @endcomponent
                </div>
            </div>
    
            <div class="card mt-3">
                <div class="card-header">
                    {{ __('Employees list') }}
                    
                    <span class="text-muted">
                        ({{ $employees->count() }})
                    </span>
                </div>
    
                @component('components.table')
                    @slot('thead')
                        <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Phone') }}</th>
                            <th scope="col">{{ __('Contracted at') }}</th>
                        </tr>
                    @endslot
    
                    @slot('tbody')
                        @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <a href="{{ route('employee.show', $employee->id) }}" class="text-dark">
                                        {{ $employee->full_name }}
                                    </a>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->contracted_at }}</td>
                            </tr>
                        @endforeach
                    @endslot
                @endcomponent
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
        $("#delete-company").click(() => {
            swal({
                title: "{{ __('Are you sure you want to delete this company?') }}",
                text: "{{ __('This action is irreverent and all your employees will be excluded.') }}",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (!willDelete) {
                    return;
                }

                $.ajax({
                    url: $(this).attr('data-action'),
                    method: 'delete',
                    data: {'_token': '{{ csrf_token() }}'}
                }).done(function (response) {
                    return swal(response.data).then(() => {
                        $(location).attr('href', "{{ route('company.index') }}");
                    });
                });
            });
        });

        $("form").submit((event) => {
            event.preventDefault();
            ajaxStoreUpdateRequest($("form"));
        });
    </script>
@endpush