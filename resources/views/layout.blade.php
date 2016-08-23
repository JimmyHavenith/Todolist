<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Todolist</title>
  </head>
  <body id="app-layout">
    <header>
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                Todolist
            </a>
          </div>
          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/projects') }}">Projets</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Se connecter</a></li>
                <li><a href="{{ url('/register') }}">S'inscire</a></li>
              @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Se déconecter</a></li>
                  </ul>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
      @if (session()->has('flash_notification.message'))
        <div class="container">
            @include('flash::message')
        </div>
      @endif
      @if ($errors->any())
        <div class="flash alert-danger">
          @foreach ($errors->all() as $error )
            <p>
              {{ error }}
            </p>
          @endforeach
        </div>
      @endif
    </header>
    <section style="min-height: 500px; margin-top: 60px">
      <div class="container">
        @yield('mainContent')
      </div>
    </section>
    <footer style="background-color: #222222;">
    </footer>
  </body>
</html>
