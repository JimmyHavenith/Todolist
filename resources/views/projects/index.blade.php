@extends('layout')

@section('mainContent')
  <h2>Projets</h2>

  @if ( !$projects->count() )
    Vous n'avez pas de projets
  @else
    <ul>
      @foreach( $projects as $project )
        <li><a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a> </li>
      @endforeach
    </ul>
  @endif
@endsection
