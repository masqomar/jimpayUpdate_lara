@extends('admin.theme')
@section('content')
<form action="{{ route('kopkarproduct.store') }}" method="post">
    @csrf
    @include('admin.kopkarproduct.form')
</form>
@endsection