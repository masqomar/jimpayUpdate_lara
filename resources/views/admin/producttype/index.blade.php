@extends('admin.theme')
@section('title')
Product Type
@endsection
@section('content')
<div>
    <div class="mb-10">
        <a href="{{ route('producttype.create') }}" class="btn btn-primary">
            + Create Product Type
        </a>
    </div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <table id="crudTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                data: 'id',
                name: 'id',
                width: '5%'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '25%'
            },
        ],
    });
</script>
@endpush