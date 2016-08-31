@extends('layout')
@section('title', 'Tâche' )
@section('mainContent')
  <h2>{{ $task->name }} <span class="task-to-projet">( {{ $project->name }} )</span></h2>
  <div class="task-add">
    <div class="task-show task-show-description">
      <h3>Description</h3>
      <p>
        @if( empty( $task->description ) )
          Il n'y a pas de description
        @else
          {{ $task->description }}
        @endif
      </p>
    </div>
    <div class="task-show task-show-date">
      <h3>Echéance</h3>
      <p>
        @if( empty( $task->date ) )
          Il n'y a pas d'échéance
        @else
          {{ $task->date }}
        @endif
      </p>
    </div>
    <div class="task-show-edit">
      <a href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}">
      Modifier
      </a>
    </div>
  </div>
@endsection
