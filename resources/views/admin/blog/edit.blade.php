@extends('admin.theme')
@section('content')
<form action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('admin.blog.form')
</form>
@endsection