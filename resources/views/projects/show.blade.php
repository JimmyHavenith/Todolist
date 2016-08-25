@extends('layout')

@section('mainContent')
  <h2>{{ $project->name }}</h2>
  <div class="task-add">
    {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'role' => 'form']) !!}
      <input type="text" name="name" placeholder="Ajouter une tâche">
      {{ Form::button('Ajouter', array('class'=>'btn btn-primary', 'type'=>'submit')) }}
    {!! Form::close() !!}
  </div>
  {!! Form::model(new App\Task, ['route' => ['check'], 'role' => 'form']) !!}
    <ol>
      @foreach( $project->tasks as $task )
        <li class="tasks-item">
          @if( $task->completed == 0 )
            <input type="checkbox" name="task-item[]" id="{{ $task->id }}" value="{{ $task->id }}"><span class="tasks-item-name">{{ $task->name }}</span>
          @else
            <input type="checkbox" class="completed" name="task-item[]" id="{{ $task->id }}" value="{{ $task->id }}"><span class="tasks-item-name">{{ $task->name }}</span>
          @endif
          <div class="tasks-item-button">
            <a title="voir la tâche" class="tasks-item-option" href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><div class="blue"></div></span><span class="tasks-item-option-txt">Voir la Tâche</span>
            </a>
            <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
              <span class="tasks-item-option-logo"><div class="orange"></div></span><span class="tasks-item-option-txt">Editer la Tâche</span>
            </a>
            <!-- {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
            {{Form::button('<span class="task-item-option">Supprimer la tâche</span>', array('type' => 'submit'))}}
            {!! Form::close() !!} -->
          </div>
        </li>
      @endforeach
    </ol>
    {{ Form::button('Valider', array('type'=>'submit')) }}
  {!! Form::close() !!}
  <h3><a href="#">Afficher les tâches effectuées</a></h3>
@endsection
