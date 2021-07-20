<form method="{{ $method === 'get' ? 'get' : 'post' }}" action="{{ $route }}" enctype='multipart/form-data'>
    @method($method)
    {{ csrf_field() }}

    <div class="mb-3">
        <label for="company_name" class="form-label">Name</label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="company_name"
            value="@isset($name) {{ $name }} @endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_email" class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id="company_email"
            value="@isset($email) {{ $email }} @endisset"
        >
        <div class="form-text">
            We'll never share your email with anyone else.
        </div>
    </div>

    <div class="mb-3">
        <label for="company_address" class="form-label">Address</label>
        <input
            type="text"
            class="form-control"
            name="address"
            id="company_address"
            value="@isset($address) {{ $address }} @endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_website" class="form-label">Website</label>
        <input
            type="text"
            class="form-control"
            name="website"
            id="company_website"
            value="@isset($website) {{ $website }} @endisset"
        >
    </div>

    <div class="mb-3">
        <label for="company_logo" class="form-label">Logo</label>
        <input
            type="file"
            class="form-control"
            name="company_logo"
            id="company_logo"
        >
    </div>

    <button type="submit" class="btn btn-primary">
        @isset($name)
            Update
        @else
            Create
        @endisset
    </button>
</form>