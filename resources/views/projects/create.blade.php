@extends('layout')

@section('mainContent')
  <h2>Créer un projet</h2>
  <div class="task-add">
    {!! Form::model(new App\Project, array('route' => ['projects.store'], 'role' => 'form')) !!}
        @include('projects/partials/_form', array('submit_text' => 'Créer le projet'))
    {!! Form::close() !!}
  </div>
@endsection
