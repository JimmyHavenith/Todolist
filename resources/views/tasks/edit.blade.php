@extends('layout')

@section('mainContent')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            Editer la tâche "{{ $task->name }}"
          </div>
          <div class="panel-body">
            {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug], 'class'=>'form-horizontal', 'role' => 'form']) !!}
                @include('tasks/partials/_form', array('submit_text' => 'Editer la tâche', 'submit_icon' => 'pencil'))
            {!! Form::close() !!}
          </div>
          <div class="panel-footer">
            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-info" type="button">
                <span class="fa fa-reply" aria-hidden="true"></span> Retourner à {{ $project->name }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
