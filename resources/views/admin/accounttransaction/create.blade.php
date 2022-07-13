@extends('admin.theme')
@section('content')
<form action="{{ route('accounttransaction.store') }}" method="post">
    @csrf
    @include('admin.accounttransaction.form')
</form>
@endsection