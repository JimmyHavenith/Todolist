@extends('layout')

@section('mainContent')

  <h2>Modifier un projet</h2>

  {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]]) !!}
    @include('projects/partials/_form', ['submit_text' => 'Edit Project'])
  {!! Form::close() !!}

@endsection
