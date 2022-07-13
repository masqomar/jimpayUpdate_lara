@extends('admin.theme')
@section('content')
<form action="{{ route('kopkarproduct.update',$kopkarproduct->id) }}" method="post">
    @method('PUT')
    @csrf
    @include('admin.kopkarproduct.form')
</form>
@endsection