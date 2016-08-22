@extends('layout')
@section('mainContent')
  <h2>{{ $project->name }}</h2>

  @if ( !$project->tasks->count() )
    Ton projet n'a pas de tâches qui lui sont associées
  @else
    <ul>
      @foreach( $project->tasks as $task )
        <li><a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a></li>
      @endforeach
    </ul>
  @endif
@endsection
