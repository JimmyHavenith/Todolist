<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">

    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
    <title>Todolist | @yield('title')</title>
  </head>
  <body id="app-layout">
    <header>
      <nav class="header-menu">
        <div class="header-menu-logo">
          <h1><a href="/today">Todolist</a></h1>
        </div>
        <div class="header-menu-nav">
          <ul>
          @if( Auth::check() )
            <li><a href="/auth/logout">Se déconnecter</a></li>
          @else
            <li><a href="/auth/login">Se connecter</a></li>
            <li><a href="/auth/register">S'inscrire</a></li>
          @endif
          </ul>
        </div>
      </nav>
      @if (session()->has('flash_notification.message'))
        <div class="container">
            @include('flash::message')
        </div>
      @endif
    </header>
    @if( Auth::check() )
    <section class="lists">
      <div class="lists-lists">
        <div class="lists-inner">
          <div class="lists-scroll">
            <ul>
              <li><a href="/today"><img src="/img/icon-today.png" alt="" /><span>Aujourd'hui</span></a></li>
              <li><a href="#"><img src="/img/icon-week.png" alt="" /><span>Cette semaine</span></a></li>
            </ul>
            <ul>
              <?php $categories = \Auth::user()->projects()->get(); ?>
              @foreach( $categories as $category)
                <li>
                  <a class="project-show" href="{{ route('projects.show', $category->slug) }}">
                    <img src="/img/icon-project.png" alt="" />
                    <span>{{ $category->name }}</span>
                    <a class="icon-project-edit" href="{{ route('projects.edit', array($category->slug)) }}"><img src="/img/icon-project-edit.png" alt="" /><span>Editer</span></a>
                  </a>
                </li>
              @endforeach
                <li class="lists-add"><a href="{{ url('/projects/create') }}"><span>+</span>Créer un projet</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    @endif
    <section class="tasks">
      <div class="tasks-tasks">
          @yield('mainContent')
      </div>
    </section>
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
