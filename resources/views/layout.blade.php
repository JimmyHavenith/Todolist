<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Todolist</title>
  </head>
  <body>
    <header>
      <div class="navbar navbar-default navbar-fixed-top" style="background-color: #222222; color: white;">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="/projects">Todolist</a>
          </div>
          <div id="navbar-main" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a starget="_blank" href="#">Se connecter</a></li>
              <li><a target="_blank" href="#">S'inscrire</a></li>
              <li><a target="_blank" href="#">Se déconnecter</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    @if (session()->has('flash_notification.message'))
      <div class="flash alert-info">
        <@include('flash::message')
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
    <section style="min-height: 500px; margin-top: 60px">
      <div class="container">
        @yield('mainContent')
      </div>
    </section>
    <footer style="background-color: #222222;">
    </footer>
  </body>
</html>
