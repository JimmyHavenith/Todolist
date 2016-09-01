@extends('layout')
@section('title', 'Projets' )
@section('mainContent')
  @if( $project == null )
    <h2>Vous n'avez pas encore de projets</h2>
  @else
    <h2>{{ $project->name }}</h2>
    <div class="task-add">
      {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'role' => 'form']) !!}
        <input type="text" name="name" placeholder="+ Ajouter une tâche" class="task-form-project">
        {{ Form::button('Ajouter', array('type'=>'submit', 'class'=>'task-add-submit')) }}
      {!! Form::close() !!}
    </div>
    {!! Form::model(new App\Task, ['route' => ['check'], 'role' => 'form', 'class' => 'sendForm sendFormDesc']) !!}
      <input type="hidden" name="project" value="{{ $project->id }}">
      <ol class="unchecked-task-group">
        @foreach( $project->tasks as $task )
          @if( $task->completed == 0 )
            <li class="tasks-item">
              <input type="checkbox" name="task-check[]" id="{{ $task->id }}" class="check-task-box" value="{{ $task->id }}"><span class="tasks-item-name">{{ $task->name }}</span>
              <input type="hidden" name="all-tasks[]" value="{{ $task->id }}">
              <div class="tasks-item-button">
                <a title="voir la tâche" class="tasks-item-option task-item-see" href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}">
                  <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="icon pour voir le tache" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
                </a>
                <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
                  <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="icon pour editer le tache" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
                </a>
                <a title="Supprimer la tâche" class="tasks-item-option task-item-delete" href="{{ action('TasksController@destroy', ['id' => $task->id]) }}">
                  <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="icon pour supprimer le tache" /></span><span class="tasks-item-option-txt">Supprimer la Tâche</span>
                </a>
              </div>
              <div class="tasks-item-infos">
                <div class="tasks-item-infos-date">
                  <span class="tasks-item-infos-icon">
                      <img src="../img/icon-date.png" alt="icon échéance de la tache" />
                  </span>
                  <div class="task-infos">
                    <p class="task-infos-date">
                      @if( $task->date )
                        {{ $task->date }}
                      @else
                        Il n'y a pas d'échéance
                      @endif
                    </p>
                  </div>
                </div>
                <div>
                </div>
                <div class="tasks-item-infos-desc">
                  <span class="tasks-item-infos-icon">
                    <img src="../img/icon-desc.png" alt="icon description du projet" />
                  </span>
                  <div class="task-infos">
                    <p class="task-infos-p">
                    @if( $task->description )
                      {{ $task->description }}
                    @else
                      Il n'y a pas de description
                    @endif
                    </p>
                  </div>
                </div>
              </div>
            </li>
          @endif
        @endforeach
      </ol>
      <span class="tasks-done-title"><a title="Afficher les tâches effectuées" href="#">Afficher les tâches effectuées</a></span>
      <input type="hidden" name="project" value="{{ $project->id }}">
      <ol class="checked-task-group">
        @foreach( $project->tasks as $task )
          @if( $task->completed == 1 )
            <li class="tasks-item">
              <input type="checkbox" class="check-task-box completed" name="task-check[]" id="{{ $task->id }}" value="{{ $task->id }}" checked="checked"><span class="tasks-item-name">{{ $task->name }}</span>
              <input type="hidden" name="all-tasks[]" value="{{ $task->id }}">
            <div class="tasks-item-button">
              <a title="voir la tâche" class="tasks-item-option task-item-see" href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="icon pour voir la tache" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
              </a>
              <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="icon pour éditer la tache" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
              </a>
              <a title="Supprimer la tâche" class="tasks-item-option task-item-delete" href="{{ action('TasksController@destroy', ['id' => $task->id]) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="icon pour supprimer la tache" /></span><span class="tasks-item-option-txt">Supprimer la Tâche</span>
              </a>
              </div>
              <div class="tasks-item-infos">
                <div class="tasks-item-infos-date">
                  <span class="tasks-item-infos-icon">
                      <img src="../img/icon-date.png" alt="icone échéance de la tache" />
                  </span>
                  <div class="task-infos">
                    <p>
                      @if( $task->date )
                        {{ $task->date }}
                      @else
                        Il n'y a pas d'échéance
                      @endif
                    </p>
                  </div>
                </div>
                <div class="tasks-item-infos-desc">
                  <span class="tasks-item-infos-icon">
                    <img src="../img/icon-desc.png" alt="icone description du projet" />
                  </span>
                  <div class="task-infos">
                    <p>
                      @if( $task->description )
                        {{ $task->description }}
                      @else
                        Il n'y a pas de description
                      @endif
                    </p>
                  </div>
                </div>
              </div>
            </li>
          @endif
        @endforeach
      </ol>
      {{ Form::button('Valider', array('class'=>'task-done-submit', 'type'=>'submit')) }}
    {!! Form::close() !!}
  @endif
@endsection
