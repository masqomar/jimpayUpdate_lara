@extends('admin.theme')
@section('title')
Anggota
@endsection
@section('content')
<div>
    <div class="mb-10">
        <a href="{{ route('member.create') }}" class="btn btn-primary">
            + Tambah Anggota
        </a>
    </div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <table id="crudTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>No Anggota</th>
                        <th>Tanggal Bergabung</th>
                        <th>No Telepon</th>
                        <th>Saldo</th>
                        <th>Status</th>
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
                data: 'email',
                name: 'email'
            },
            {
                data: 'gender',
                name: 'gender'
            },
            {
                data: 'no_anggota',
                name: 'no_anggota'
            },
            {
                data: 'registration_date',
                name: 'registration_date'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'balance',
                render: $.fn.dataTable.render.number(',', '', 0, 'Rp. '),
                name: 'balance'
            },
            {
                data: 'status',
                name: 'status'
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