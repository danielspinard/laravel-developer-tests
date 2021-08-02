<form
    method="{{ ($method === 'GET' ? $method : 'POST')  }}"
    action="{{ $route }}"
    enctype="multipart/form-data"
>
    {{-- router method --}}
    @method($method)

    {{-- csrf protection --}}
    {{ csrf_field() }}

    {{-- form body --}}
    {{ $slot }}
</form>
