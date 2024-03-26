<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample08">
          <ul class="navbar-nav">
            @if (!Auth::check())                
              <li class="nav-item">
                <a class="nav-link active btn" aria-current="page" href="{{url('login')}}">Login</a>
              </li>
              <li class="nav-item ms-2">
                <a class="nav-link active btn" aria-current="page" href="{{url('register')}}">Register</a>
              </li>
            @else
              <li class="ms-2">
                <a class="nav-link active btn" aria-current="page" href="{{url('logout')}}">logout</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('content')

    <footer class="text-muted py-5">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
          <p class="mb-1">Album example is © Bootstrap, but please download and customize it for yourself!</p>
          <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.2/getting-started/introduction/">getting started guide</a>.</p>
        </div>
      </footer>
      <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
  </html>