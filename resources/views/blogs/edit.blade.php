@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-muted">Edit Blog</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" id="category" list="categoryList" value="{{old('category',$blog->category)}}">
            <datalist id="categoryList">
                <option value="Fitness">
                <option value="Weight Management">
                <option value="Daily Wellness">
            </datalist>
        </div>
        

        <div class="form-group">
            <label for="image">Image </label>
            <input type="file" name="image" class="form-control">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-success m-2">Update Blog</button>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary m-2">Return</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection