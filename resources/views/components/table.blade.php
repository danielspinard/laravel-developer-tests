<div class="px-3 pt-2">
    <table class="table table-borderless">
        <thead>
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
</div>

@push('style')
    <style>
        .table > thead, .table > tbody > tr:not(:last-child) {
            padding: .5rem .5rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }


        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        table thead tr th {
            font-weight: 600;
            color: 000;
        }

        table thead tr td {
            font-weight: 400;
        }
    </style>
@endpush