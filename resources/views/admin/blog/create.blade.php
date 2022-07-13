@extends('admin.theme')
@section('content')
<form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('admin.blog.form')
</form>
@endsection