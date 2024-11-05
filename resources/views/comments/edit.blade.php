@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Admin Response</h3>
    
    <p><strong>User Comment:</strong> {{ $comment->message }}</p>
    
    <!-- Admin Response Form -->
    <form action="{{ route('comments.updateResponse', $comment->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="admin_response">Your Response</label>
            <textarea name="admin_response" id="admin_response" class="form-control" rows="3">{{ $comment->admin_response }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save Response</button>
    </form>
    <button class="btn btn-danger mt-2"><a href="{{url('comments')}}">Return</a></button>
</div>
@endsection
