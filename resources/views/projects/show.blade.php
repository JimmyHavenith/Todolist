@extends('layout')

@section('mainContent')
  <h2>{{ $project->name }}</h2>
  <div class="task-add">
    {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'role' => 'form']) !!}
      <input type="text" name="name" placeholder="Ajouter une tâche" class="task-add-form">
      {{ Form::button('Ajouter', array('type'=>'submit', 'class'=>'task-add-submit')) }}
    {!! Form::close() !!}
  </div>

  {!! Form::model(new App\Task, ['route' => ['check'], 'role' => 'form']) !!}
    <input type="hidden" name="project" value="{{ $project->id }}">
    <ol>
      @foreach( $project->tasks as $task )
        @if( $task->completed == 0 )
          <li class="tasks-item">
            <input type="checkbox" name="task-check[]" id="{{ $task->id }}" value="{{ $task->id }}"><span class="tasks-item-name">{{ $task->name }}</span>
            <div class="tasks-item-button">
              <a title="voir la tâche" class="tasks-item-option" href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
              </a>
              <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
                <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
              </a>
              <a title="Supprimer la tâche" class="tasks-item-option" href="">
                <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
              </a>
              <!-- {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
              {{Form::button('<span class="task-item-option">Supprimer la tâche</span>', array('type' => 'submit'))}}
              {!! Form::close() !!} -->
            </div>
            <div class="tasks-item-infos">
              <div class="tasks-item-infos-date">
                <span class="tasks-item-infos-icon">
                    <img src="../img/icon-date.png" alt="" />
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
                  <img src="../img/icon-desc.png" alt="" />
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

  <h3 class="tasks-done-title"><a href="#">Afficher les tâches effectuées</a></h3>
  {!! Form::model(new App\Task, ['route' => ['uncheck'], 'role' => 'form']) !!}
    <input type="hidden" name="project" value="{{ $project->id }}">
    <ol>
      @foreach( $project->tasks as $task )
        @if( $task->completed == 1 )
          <li class="tasks-item">
            <input type="checkbox" name="task-check[]" id="{{ $task->id }}" value="{{ $task->id }}" checked="checked" class="completed"><span class="tasks-item-name">{{ $task->name }}</span>
            <input type="hidden" name="task-uncheck[]" value="{{ $task->id }}">
          <div class="tasks-item-button">
            <a title="voir la tâche" class="tasks-item-option" href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
            </a>
            <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
            </a>
            <a title="Supprimer la tâche" class="tasks-item-option" href="">
              <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
            </a>
            <!-- {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
            {{Form::button('<span class="task-item-option">Supprimer la tâche</span>', array('type' => 'submit'))}}
            {!! Form::close() !!} -->
            </div>
            <div class="tasks-item-infos">
              <div class="tasks-item-infos-date">
                <span class="tasks-item-infos-icon">
                    <img src="../img/icon-date.png" alt="" />
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
                  <img src="../img/icon-desc.png" alt="" />
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
@endsection
