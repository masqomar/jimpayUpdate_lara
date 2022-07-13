@extends('admin.theme')
@section('content')
<form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('admin.member.form')
</form>
@endsection