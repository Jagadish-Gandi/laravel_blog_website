@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center text-muted">Create New Blog</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required placeholder="Enter Description">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" id="category" list="categoryList">
            <datalist id="categoryList">
                <option value="Fitness">
                <option value="Weight Management">
                <option value="Daily Wellness">
            </datalist>
        </div>
        <div class="form-group m-2">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control mb-2">
        </div>
        <button type="submit" class="btn btn-success mb-2 ">Create Blog</button><br/>
        <a href="{{route('dashboard')}}"><button class="btn btn-danger text-center text-white">Return</button></a>
    </form>
</div>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
