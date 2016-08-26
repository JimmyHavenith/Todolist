@extends('layout')

@section('mainContent')
<h2>Modifier la tâche "{{ $task->name }}"</h2>
<div class="task-add">
  {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug], 'class'=>'form-horizontal', 'role' => 'form']) !!}
      @include('tasks/partials/_form', array('submit_text' => 'Editer la tâche', 'submit_icon' => 'pencil'))
  {!! Form::close() !!}
</div>
@endsection
