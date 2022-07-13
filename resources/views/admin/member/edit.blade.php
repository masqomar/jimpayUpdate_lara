@extends('admin.theme')
@section('content')
<form action="{{ route('member.update',$member->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('admin.member.form')
</form>
@endsection