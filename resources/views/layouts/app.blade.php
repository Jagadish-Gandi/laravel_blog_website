{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DashBoard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>

  <div class="sidebar">
    <a href="{{url('/')}}"><img src="{{asset('items/gjb.jpeg')}}" height="40px" class="rounded-circle ml-4" alt=""></a>
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
    <a href="{{ route('blogs.create') }}" class="{{ request()->routeIs('blogs.create') ? 'active' : '' }}">Form</a>
    <a href="{{ route('blogs.index') }}" class="{{ request()->routeIs('blogs.index') ? 'active' : '' }}">Blogs</a>
    <a href="{{ route('comments.index') }}" class="{{ request()->routeIs('comments.index') ? 'active' : '' }}">Comments</a>
    
    <a href="#" class="display-bottom">{{ Auth::user()->name }}</a>
    <form method="POST" action="{{ route('logout') }}" style="display: inline;" >
      @csrf
      <a href="javascript:void(0);" onclick="event.preventDefault(); this.closest('form').submit();" class="">Logout</a>
    </form>

  </div>

  <div class="content" style="margin-left: 250px; padding: 20px;">
    @yield('content')
  </div>

  <!-- Optional Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
  </script>
</body>
</html>
