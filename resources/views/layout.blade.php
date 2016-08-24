<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
              @if( Auth::check() )
              <li>
                <a href="/today">Aujourd'hui</a>
              </li>
              @else
                <li><a href="/auth/login">Projets</a></li>
              @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if( Auth::check() )
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/auth/logout"><i class="fa fa-btn fa-sign-out"></i>Se déconnecter</a></li>
                </ul>
              </li>
              @else
                <li><a href="/auth/login">Se connecter</a></li>
                <li><a href="/auth/register">S'inscire</a></li>
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
    </header>
    <section style="min-height: 500px; margin-top: 60px">
      <div class="container">
        @yield('mainContent')
      </div>
    </section>
    <footer style="background-color: #222222;">
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
    $(function() {
      $( "#datepicker" ).datepicker();
    });
    </script>
  </body>
</html>
