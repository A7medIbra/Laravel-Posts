@extends('layouts.app')

@section('title')Edit @endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('posts.update', ['post' => $post['id']]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value={{ $post['id'] }} class="form-control" id="exampleFormControlInput1">
    <div class="container">
    <div class="mb-3">
        <label  class="form-label">Title</label>
        <input type="text" name="title" value={{ $post['title'] }} class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label  class="form-label">Body</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $post['description'] }}</textarea>
    </div>
    <div class="mb-3">
        <label  class="form-label">Post Creator</label>
        <select name="creator" value={{ $post->user->name }} class="form-control">
            <option value="{{ $post['user_id'] }}" selected hidden>{{ $post->user->name }}</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
    </div>
@endsection
    