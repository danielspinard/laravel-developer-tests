@component('components.form')
@slot('method', strtoupper($method))
@slot('route', $route)

<div class="mb-3">
    <label for="employee_first_name" class="form-label">
        {{ __('First Name') }}
    </label>

    <input
        type="text"
        class="form-control"
        name="first_name"
        id="employee_first_name"
        value="@isset($employee->first_name){{ $employee->first_name }}@endisset"
    >
</div>

<div class="mb-3">
    <label for="employee_last_name" class="form-label">
        {{ __('Last Name') }}
    </label>

    <input
        type="text"
        class="form-control"
        name="last_name"
        id="employee_last_name"
        value="@isset($employee->last_name){{ $employee->last_name }}@endisset"
    >
</div>

<div class="mb-3">
    <label for="employee_email" class="form-label">
        {{ __('E-mail') }}
    </label>

    <input
        type="text"
        class="form-control"
        name="email"
        id="employee_email"
        value="@isset($employee->email){{ $employee->email }}@endisset"
    >
</div>

<div class="mb-3">
    <label for="employee_phone" class="form-label">
        {{ __('Phone') }}
    </label>

    <input
        type="text"
        class="form-control"
        name="phone"
        id="employee_phone"
        value="@isset($employee->phone){{ $employee->phone }}@endisset"
    >
</div>

<button type="submit" class="btn btn-primary">
    @isset($employee)
        {{ __('Update employee info') }}
    @else
        {{ __('Create new employee') }}
    @endisset
</button>
@endcomponent