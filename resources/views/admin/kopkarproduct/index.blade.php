@extends('admin.theme')
@section('title')
Product Koperasi
@endsection
@section('content')
<div>
    <div class="mb-10">
        <a href="{{ route('kopkarproduct.create') }}" class="btn btn-primary">
            + Create Product Koperasi
        </a>
    </div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <table id="crudTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product Type</th>
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
                data: 'product_types_id',
                name: 'product_types_id'
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