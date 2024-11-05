@extends('pages.main_page')
@section('content')
<div class="container mt-1">
  <div class="card mb-4 shadow-sm border-0">
      <div class="card-body">
        <p class="text-center">{{$blog->category}}</p>
        <h1 class="card-title text-center" style="color: rgb(6, 92, 48)">{{ $blog->title }}</h1>            
        <p class="text-muted mb-4 text-center">Posted on {{ $blog->created_at->format('F j, Y') }}</p>
        <img src="{{ asset('images/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 400px; object-fit: cover;">
        <p class="card-text">{!! $blog->content !!}</p>
    </div>
    <h3 class="container mt-5 mb-4 text-center">Comments</h3>
@foreach ($blog->comments->whereNull('parent_id') as $comment)
  <!-- User Comment -->
  <div class="comment p-4 mb-4 bg-light rounded shadow-sm border">
      <strong class="text-info" style="font-size: 1.2em;">{{ $comment->name }}</strong>
      <p class="mb-3" style="font-size: 1em; color: #333;">{{ $comment->message }}</p>

      <!-- Display Admin Response if it exists -->
      @if (!is_null($comment->admin_response)) <!-- Check if admin response exists -->
          <div class="reply ml-4 mt-3 p-3 bg-white border-left border-info rounded shadow-sm" style="border-left-width: 5px;">
              <strong class="text-success" style="font-size: 1em;">Admin:</strong>
              <p style="font-size: 0.95em; color: #555;">{{ $comment->admin_response }}</p>
          </div>
      @endif
  </div>
@endforeach
    
      <!-- Comment Form -->
<div class="comment p-3 bg-dark inline-container">
  <h4 class="text-center text-white mt-5 mb-3">Leave a Comment</h4>
  <form action="{{ route('comments.store', $blog->id) }}" class="form-horizontal" method="POST" class="mb-5">
  @csrf
  <div class="form-group">
       <label for="" class="control-label text-white col-sm-2 m-2">Name:</label>
      <input type="text" name="name" class="form-control mb-2" placeholder="Your name" required>
  </div>
  <div class="form-group">
      <label for="" class="m-2 text-white">Message:</label>
      <textarea name="message" class="form-control mb-2" placeholder="Your message" required></textarea>
  </div>
  <button type="submit" class="btn btn-info text-white m-2">Submit</button>
</form>
</div>
  

<div class="mt-5">
  <a href="{{ url('/') }}" class="btn btn-danger">Back to Blogs</a>
</div>
  </div>
</div>
@endsection