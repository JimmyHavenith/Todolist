@extends('layout')
@section('title', 'Etiquette' )
@section('mainContent')
  @if( $tag == null )
    <h2>Vous n'avez pas encore d'étiquettes</h2>
  @else
    <h2>{{ $tag->name }}</h2>

  {!! Form::model(new App\Task, ['route' => ['check'], 'role' => 'form', 'class' => 'sendForm sendFormDesc']) !!}
    <input type="hidden" name="project" value="{{ $tag->id }}">
    <ol class="unchecked-task-group">
      @foreach( $tag->tasks as $task )
        @if( $task->completed == 0 )
          <li class="tasks-item">
            <input type="checkbox" name="task-check[]" id="{{ $task->id }}" class="check-task-box" value="{{ $task->id }}"><span id="title-task-name" contenteditable data-name="custom-text" class="tasks-item-name">{{ $task->name }}</span>
            <input type="hidden" name="all-tasks[]" value="{{ $task->id }}">
            <div class="tasks-item-button">
              <a title="voir la tâche" class="tasks-item-option" href="{{ route('tags.tasks.show', array($tag->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="icon pour voir la tache" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
              </a>
              <a title="editer la tâche" class="tasks-item-option" href="{{ route('tags.tasks.edit', array($tag->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="icon pour éditer la tache" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
              </a>
              <a title="Supprimer la tâche" class="tasks-item-option" href="">
                <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="icon pour supprimer la tache" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
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
                      Ajouter une échéance
                    @endif
                  </p>
                </div>
              </div>
              <div class="tasks-item-infos-desc">
                <span class="tasks-item-infos-icon">
                  <img src="../img/icon-desc.png" alt="icone description de la tache" />
                </span>
                <div class="task-infos">
                  <p>
                    @if( $task->description )
                      {{ $task->description }}
                    @else
                      Ajouter une description
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
    <input type="hidden" name="project" value="{{ $tag->id }}">
    <ol class="checked-task-group">
      @foreach( $tag->tasks as $task )
        @if( $task->completed == 1 )
          <li class="tasks-item">
            <input type="checkbox" name="task-check[]" id="{{ $task->id }}" value="{{ $task->id }}" checked="checked" class="check-task-box-tag completed"><span class="tasks-item-name">{{ $task->name }}</span>
            <input type="hidden" name="all-tasks[]" value="{{ $task->id }}">
          <div class="tasks-item-button">
            <a title="voir la tâche" class="tasks-item-option" href="{{ route('tags.tasks.show', array($tag->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="icon pour voir la tâche" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
            </a>
            <a title="editer la tâche" class="tasks-item-option" href="{{ route('tags.tasks.edit', array($tag->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="icon pour éditer la tâche" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
            </a>
            <a title="Supprimer la tâche" class="tasks-item-option" href="{{ route('tags.tasks.destroy', array($tag->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="icon pour supprimer la tâche" /></span><span class="tasks-item-option-txt">Supprimer la Tâche</span>
            </a>
            </div>
            <div class="tasks-item-infos">
              <div class="tasks-item-infos-date">
                <span class="tasks-item-infos-icon">
                    <img src="../img/icon-date.png" alt="icone pour l'échéance de la tâche" />
                </span>
                <div class="task-infos">
                  <p>
                    @if( $task->date )
                      {{ $task->date }}
                    @else
                      Ajouter une échéance
                    @endif
                  </p>
                </div>
              </div>
              <div class="tasks-item-infos-desc">
                <span class="tasks-item-infos-icon">
                  <img src="../img/icon-desc.png" alt="icone pour la description de la tâche" />
                </span>
                <div class="task-infos">
                  <p>
                    @if( $task->description )
                      {{ $task->description }}
                    @else
                      Ajouter une description
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
