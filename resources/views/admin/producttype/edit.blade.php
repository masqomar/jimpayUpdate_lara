@extends('admin.theme')
@section('content')
<form action="{{ route('producttype.update',$producttype->id) }}" method="post">
    @method('PUT')
    @csrf
    @include('admin.producttype.form')
</form>
@endsection