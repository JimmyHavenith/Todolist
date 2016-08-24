@extends('layout')

@section('mainContent')
  <h2>{{ $project->name }}</h2>
  <div class="task-add">
    <a href="/projects/{{$project->slug}}/tasks/create" class="task-add-button" type="button">
      <span>+</span>Ajouter une tâche
    </a>
  </div>
  <ol>
    @foreach( $project->tasks as $task )
      <li>
        <div class="tasks-item">
          <label><input type="checkbox" id="cbox1" value="premiere_checkbox"><span class="tasks-item-name">{{ $task->name }}</span></label>
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
        </div>
      </li>
    @endforeach
  </ol>
  <h3><a href="#">Afficher les tâches effectuées</a></h3>
@endsection
