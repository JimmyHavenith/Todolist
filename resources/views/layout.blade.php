<!DOCTYPE html>
<html lang="fr-BE">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <title>minimaList | @yield('title')</title>
  </head>
  <body id="app-layout" class="{{ isset(Auth::user()->color) ? Auth::user()->color : '' }} {{ isset(Auth::user()->font) ? Auth::user()->font : '' }}">
    <header class="header">
      <nav class="header-menu">
        <div class="header-menu-logo">
          <h1><a title="Aller vers la page d'accueil de minimaList" href="/today">minima<span>List</span></a></h1>
        </div>
        <div class="header-menu-nav">
          <ul>
          @if( Auth::check() )
            <li>
              <a class="menu-hb-button" href="#">{{ Auth::user()->name }} <img src="/img/icon-hb.png" alt="" /></a>
              <ul class="auth-options">
                <li><a title="Aller dans les paramètres" href="/settings">Paramètres</a></li>
                <li><a title="Se déconnecter" href="/auth/logout">Se déconnecter</a></li>
              </ul>
          @else
            <li><a title="Se connecter" href="/auth/login">Se connecter</a></li>
            <li><a title="Se déconnecter" href="/auth/register">S'inscrire</a></li>
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
            <ul class="auth-responsive">
              <li><a title="Aller vers les paramètres" href="/settings"><img src="/img/icon-setting.png" alt="icone pour les paramètres" /><span>Paramètres</span></a></li>
              <li><a title="Se déconnecter" href="/auth/logout"><img src="/img/icon-logout.png" alt="icone pour se déconnecter" /><span>Se déconnecter</span></a></li>
            </ul>
            <ul>
              <li><a title="Aller vers les tâches d'aujourd'hui" href="/today"><img src="/img/icon-today.png" alt="icone pour les taches d'aujourd'hui" /><span>Aujourd'hui</span></a></li>
              <li><a title="Aller vers les tâches de demain" href="/tomorrow"><img src="/img/icon-week.png" alt="icone pour les taches de demain" /><span>Demain</span></a></li>
            </ul>
            <div class="lists-scroll-choice">
              <ul>
                <?php
                $urlParts = explode('/', Request::url());
                ?>
                @if( $urlParts[3] != 'tags' )
                  <li><a title="Aller vers tous les projets" class="list-choice-current" href="/projects">Projets</a></li>
                  <li><a title="Aller vers toutes les étiquettes" href="/tags">Étiquettes</a></li>
                @else
                  <li><a title="Aller vers tous les projets" href="/projects">Projets</a></li>
                  <li><a title="Aller vers toutes les étiquettes" class="list-choice-current" href="/tags">Étiquettes</a></li>
                @endif
              </ul>
            </div>
            @if( $urlParts[3] != 'tags' )
              <ul>
                <?php $categories = \Auth::user()->projects()->get(); ?>
                @foreach( $categories as $category)
                  <li id="{{ $category->id }}">
                    <a title="Voir le projet {{ $category->name }}" class="project-show project-name-change" href="{{ route('projects.show', $category->slug) }}">
                      <img src="/img/icon-project.png" alt="icone du projet" />
                      <span class="project-name-change-content">{{ $category->name }}</span>
                    </a>
                    <a title="Supprimer le projet" class="icon-project-delete" href="{{ action('ProjectsController@destroy', ['id' => $category->id]) }}"><img src="/img/icon-project-delete.png" alt="icone pour supprimer le projet" /><span>Supprimer</span></a>
                    <a title="Editer le projet" class="icon-project-edit project-name-change-icon" href="{{ route('projects.edit', array($category->slug)) }}"><img src="/img/icon-project-edit.png" alt="icone pour editer le projet" /><span>Editer</span></a>
                  </li>
                @endforeach
              </ul>
              {!! Form::model(new App\Project, array('route' => ['projects.store'], 'role' => 'form')) !!}
              <input type="text" name="name" placeholder="+ Créer un projet" class="add-project-form">
                {{ Form::button('Créer', array('type'=>'submit', 'class'=>'project-add-submit')) }}
              {!! Form::close() !!}
            @else
              <ul>
                <?php $etiquettes = \Auth::user()->tags()->get(); ?>
                @foreach( $etiquettes as $etiquette)
                  <li id="{{ $etiquette->id }}">
                    <a title"Voir l'étiquette {{ $etiquette->name }}" class="project-show tag-name-change" href="{{ route('tags.show', $etiquette->slug) }}">
                      <img src="/img/icon-project.png" alt="icon de l'etiquette" />
                      <span>{{ $etiquette->name }}</span>
                    </a>
                    <a title"Supprimer le projet" class="icon-project-delete" href="{{ action('TagsController@destroy', ['id' => $etiquette->id]) }}"><img src="/img/icon-project-delete.png" alt="icone pour supprimer le projet" /><span>Supprimer</span></a>
                    <a title"Editer le projet" class="icon-project-edit tag-name-change-icon" href="{{ route('tags.edit', array($etiquette->slug)) }}"><img src="/img/icon-project-edit.png" alt="icone pour éditer le projet" /><span>Editer</span></a>
                  </li>
                @endforeach
              </ul>
              {!! Form::model(new App\Tag, array('route' => ['tags.store'], 'role' => 'form')) !!}
              <input type="text" name="name" placeholder="+ Créer une étiquette" class="add-project-form">
                {{ Form::button('Créer', array('type'=>'submit', 'class'=>'project-add-submit')) }}
              {!! Form::close() !!}
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
