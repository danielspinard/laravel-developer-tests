<div class="px-3 pt-2">
    <table class="table table-borderless table-responsive">
        <thead>
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
</div>

@push('style')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush