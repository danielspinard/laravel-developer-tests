<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">

    @if (is_iterable($message))
        @foreach ($message as $alert)
            {{ $alert }} <br>
        @endforeach
    @else
        {{ $message }}
    @endif

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>