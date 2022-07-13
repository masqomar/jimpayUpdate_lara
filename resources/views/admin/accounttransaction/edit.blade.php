@extends('admin.theme')
@section('content')
<form action="{{ route('accounttransaction.update',$accounttransaction->id) }}" method="post">
    @method('PUT')
    @csrf
    @include('admin.accounttransaction.form')
</form>
@endsection