@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('posts.update',$post) }}">
    @csrf @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-2">
    <textarea name="content" class="form-control mb-2">{{ $post->content }}</textarea>
    <button class="btn btn-success">Update</button>
</form>
@endsection
