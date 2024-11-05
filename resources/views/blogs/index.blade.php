@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center text-muted">All Blogs</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <table class="container table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100px; height: auto;">
                    </td>
                    <td>{!! Str::limit($blog->content, 50) !!}</td>
                    <td>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read</a>
                        @if(auth()->check() && auth()->user()->is_admin)
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning text-white">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('dashboard')}}"><button class="btn btn-info mt-3 text-white">Return</button></a>
</div>
@endsection
