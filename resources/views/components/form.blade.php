<form method="{{ $method === 'get' ? 'get' : 'post' }}" action="{{ $route }}" enctype='multipart/form-data'>
    @method($method)
    {{ csrf_field() }}

    <div class="mb-3">
        <label for="company_name" class="form-label">
            {{ __('Name') }}
        </label>

        <input
            type="text"
            class="form-control"
            name="name"
            id="company_name"
            value="@isset($name){{ $name }}@endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_email" class="form-label">
            {{ __('E-mail') }}
        </label>

        <input
            type="email"
            class="form-control"
            name="email"
            id="company_email"
            value="@isset($email){{ $email }}@endisset"
        >

        <div class="form-text">
            {{ __('An email from the company that has not been registered before.') }}
        </div>
    </div>

    <div class="mb-3">
        <label for="company_address" class="form-label">
            {{ __('Address') }}
        </label>

        <input
            type="text"
            class="form-control"
            name="address"
            id="company_address"
            value="@isset($address){{ $address }}@endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_website" class="form-label">
            {{ __('Website') }}
        </label>

        <input
            type="text"
            class="form-control"
            name="website"
            id="company_website"
            value="@isset($website){{ $website }}@endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_logo" class="form-label">
            {{ __('Logo') }}
        </label>

        <input
            type="file"
            class="form-control"
            name="company_logo"
            id="company_logo"
        >

        @isset($logo)
            <img
                src="{{ asset('storage/' . $logo) }}"
                alt="{{ $website }} logo"
                class="mt-3 rounded"
                style="max-width: 150px"
            >
        @endisset
    </div>

    <button type="submit" class="btn btn-primary">
        @isset($name)
            {{ __('Update company info') }}
        @else
            {{ __('Create new Company') }}
        @endisset
    </button>
</form>