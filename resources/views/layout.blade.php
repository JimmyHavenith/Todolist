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
      <h1>Todolist</h1>
    </header>
    @if (session()->has('flash_notification.message'))
      <div class="flash alert-info">
        <@include('flash::message')
      </div>
    @endif
    @yield('mainContent')
    <footer>
      <p>
        Created by Jimmy Havenith
      </p>
    </footer>
  </body>
</html>
