@extends('layout')

@section('mainContent')

  <h2>Ajouter une tâche pour le projet "{{ $project->name }}"</h2>

  {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug], 'class'=>'']) !!}
    @include('tasks/partials/_form', ['submit_text' => 'Create Task'])
  {!! Form::close() !!}

@endsection
