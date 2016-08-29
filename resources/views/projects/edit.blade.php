@extends('layout')

@section('mainContent')

<h2>Modifier le projet "{{ $project->name }}"</h2>
<div class="task-add">
  {!! Form::model($project, array('method' => 'PATCH', 'route' => ['projects.update', $project->slug], 'class' => 'form-horizontal', 'role' => 'form')) !!}
      @include('projects/partials/_form-edit', array('submit_text' => 'Editer le projet', 'submit_icon' => 'pencil'))
  {!! Form::close() !!}
</div>

@endsection
