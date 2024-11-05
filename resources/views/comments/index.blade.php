@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-muted">Comments</h3>

    <!-- Comments Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                @if(auth()->check() && auth()->user()->is_admin)
                    <th>Actions</th>
                    <th>Admin Response</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->message }}</td>
                    
                    <!-- Admin Delete Option -->
                    @if(auth()->check() && auth()->user()->is_admin)
                        <td>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary">Response</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary m-2">Return</a>
</div>
@endsection
