@extends('layout')

@section('mainContent')
  <h2>{{ $task->name }}</h2>
  <div class="task-add">
    <div class="task-project">
      <h3>Projet</h3>
      <span>{!! link_to_route('projects.show', $project->name, [$project->slug]) !!}</span>
    </div>
    <div class="task-description">
      <h3>Description</h3>
      <p>
        @if( empty( $task->description ) )
          Il n'y a pas de descriptions
        @else
          {{ $task->description }}
        @endif
      </p>
    </div>
  </div>
  <a href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}" class="btn btn-sm btn-warning">
      Modifier {{ $task->name }}
  </a>
@endsection
