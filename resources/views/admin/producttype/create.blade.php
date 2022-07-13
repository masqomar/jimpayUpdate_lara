@extends('admin.theme')
@section('content')
<form action="{{ route('producttype.store') }}" method="post">
    @csrf
    @include('admin.producttype.form')
</form>
@endsection