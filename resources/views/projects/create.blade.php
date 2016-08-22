@extends('layout')

@section('mainContent')

  <h2>Créer un projet</h2>

  {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
    @include('projects/partials/_form', ['submit_text' => 'Create Project'])
  {!! Form::close() !!}

@endsection
