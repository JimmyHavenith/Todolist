<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700|Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat:400,700|Open+Sans:400,700|Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>minimaList | @yield('title')</title>
  </head>
  <body id="app-layout" class="{{ isset(Auth::user()->color) ? Auth::user()->color : '' }} {{ isset(Auth::user()->font) ? Auth::user()->font : '' }}">
    <header class="header">
      <nav class="header-menu">
        <div class="header-menu-logo">
          <h1><a href="/today">minima<span>List</span></a></h1>
        </div>
        <div class="header-menu-nav">
          <ul>
          @if( Auth::check() )
            <li>
              <a href="#">{{ Auth::user()->name }}</a>
              <ul class="auth-options">
                <li><a href="/settings">Paramètres</a></li>
                <li><a href="/auth/logout">Se déconnecter</a></li>
              </ul>
          @else
            <li><a href="/auth/login">Se connecter</a></li>
            <li><a href="/auth/register">S'inscrire</a></li>
          @endif
          </ul>
        </div>
      </nav>
    </header>
    @if( Auth::check() )
    <section class="lists">
      <div class="lists-lists">
        <div class="lists-inner">
          <div class="lists-scroll">
            <ul>
              <li><a href="/today"><img src="/img/icon-today.png" alt="" /><span>Aujourd'hui</span></a></li>
              <li><a href="/tomorrow"><img src="/img/icon-week.png" alt="" /><span>Demain</span></a></li>
            </ul>
            <div class="lists-scroll-choice">
              <ul>
                <?php
                $urlParts = explode('/', Request::url());
                ?>
                @if( $urlParts[3] != 'tags' )
                  <li><a class="list-choice-current" href="/projects">Projets</a></li>
                  <li><a href="/tags">Étiquettes</a></li>
                @else
                  <li><a href="/projects">Projets</a></li>
                  <li><a class="list-choice-current" href="/tags">Étiquettes</a></li>
                @endif
              </ul>
            </div>
            @if( $urlParts[3] != 'tags' )
              <ul>
                <?php $categories = \Auth::user()->projects()->get(); ?>
                @foreach( $categories as $category)
                  <li id="{{ $category->id }}">
                    <a class="project-show project-name-change" href="{{ route('projects.show', $category->slug) }}">
                      <img src="/img/icon-project.png" alt="" />
                      <span class="project-name-change-content">{{ $category->name }}</span>
                      <a class="icon-project-edit project-name-change-icon" href="{{ route('projects.edit', array($category->slug)) }}"><img src="/img/icon-project-edit.png" alt="" /><span>Editer</span></a>
                    </a>
                  </li>
                @endforeach
                  <li class="lists-add"><a href="{{ url('/projects/create') }}"><span>+</span>Créer un projet</a></li>
              </ul>
            @else
              <ul>
                <?php $etiquettes = \Auth::user()->tags()->get(); ?>
                @foreach( $etiquettes as $etiquette)
                  <li>
                    <a class="project-show" href="{{ route('tags.show', $etiquette->slug) }}">
                      <img src="/img/icon-project.png" alt="" />
                      <span>{{ $etiquette->name }}</span>
                      <a class="icon-project-edit" href="{{ route('tags.edit', array($etiquette->slug)) }}"><img src="/img/icon-project-edit.png" alt="" /><span>Editer</span></a>
                    </a>
                  </li>
                @endforeach
                  <li class="lists-add"><a href="{{ url('/tags/create') }}"><span>+</span>Créer une étiquette</a></li>
              </ul>
            @endif
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
    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
      $( "#locale" ).on( "change", function() {
        $( "#datepicker" ).datepicker( "option",
          $.datepicker.regional[ $( this ).val() ] );
      });
    } );
    </script>
  </body>
</html>
