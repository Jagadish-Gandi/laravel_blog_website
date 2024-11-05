<!DOCTYPE html>
<html lang="en">
<head>
  <title>GJB Blogs</title>
  <link rel="icon" type="image/x-icon" class="rounded-circle" href="{{ asset('items/gjb.jpeg') }}">
  <meta charset="utf-8">
  <meta name="description" content="blog">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <style>
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="">
        <img title="gjb blogs" class="rounded-circle" src="{{ asset('items/gjb.jpeg') }}" alt="GJB" width="40" height="40">
      </a>
      <button class="navbar-toggler btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Blog</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('fitness') }}">Fitness</a></li>
              <li><a class="dropdown-item" href="{{ route('daily') }}">Daily Wellness</a></li>
              <li><a class="dropdown-item" href="{{ route('weight') }}">Weight Management</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <form action="{{ route('blogs.search') }}" method="GET" class="d-flex">
              <div class="input-group ms-3"> <!-- Add 'me-2' for right margin -->
                <input type="text" name="query" class="form-control" placeholder="Search blogs..." required>
                <button class="btn" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                  Dashboard
                </a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                  <i class="bi bi-person-circle"></i> Admin
                </a>
              </li>
            @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <footer class="pt-4" style="font-size: 35px">
    <div class="container">
      <div class="row">
        <div class="col-md">
          <h5>Popular Categories</h5>
          <ul style="font-size: 20px" class="list-unstyled">
            <li><a href="{{ route('fitness') }}">Fitness</a></li>
            <li><a href="{{ route('daily') }}">Daily Wellness</a></li>
            <li><a href="{{ route('weight') }}">Weight Management</a></li>
          </ul>
        </div>
        <div class="col-md">
          <h5>Help Topics</h5>
          <ul style="font-size: 20px" class="list-unstyled">
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md">
          <h5>General</h5>
          <ul style="font-size: 20px" class="list-unstyled">
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Privacy Policies</a></li>
          </ul>
        </div>
      </div>
      <p class="text-center pt-3" style="font-size: 24px">Copyright © 2024. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
