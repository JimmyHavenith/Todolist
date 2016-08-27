@extends('layout')

@section('mainContent')
  <h2>Demain</h2>
  <div class="task-add">
    {!! Form::model(new App\Task, ['route' => ['projects.tasks.store', 'tomorrow'], 'class'=>'form-horizontal', 'role' => 'form']) !!}
      <input type="text" name="name" placeholder="Ajouter une tâche">
      {{ Form::button('Ajouter', array('class'=>'btn btn-primary', 'type'=>'submit')) }}
    {!! Form::close() !!}
  </div>
  @foreach( $project as $value )
    @if ( in_array( $value->id, $tomorrowProject) )
      <h3><a href="#">{{ $value->name }}</a></h3>
      <ol>
        @foreach( $tomorrowTasks as $task )
          @if( $task->project_id == $value->id )
            <li>
              <div class="tasks-item">
                <label><input type="checkbox" id="cbox1" value="premiere_checkbox"><span class="tasks-item-name">{{ $task->name }}</span></label>
                <div class="tasks-item-button">
                  <a title="voir la tâche" class="tasks-item-option" href="{{ route('projects.tasks.show', [$value->slug, $task->slug]) }}">
                    <span class="tasks-item-option-logo"><div class="blue"></div></span><span class="tasks-item-option-txt">Voir la Tâche</span>
                  </a>
                  <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($value->slug, $task->slug)) }}">
                    <span class="tasks-item-option-logo"><div class="orange"></div></span><span class="tasks-item-option-txt">Editer la Tâche</span>
                  </a>
                  <!-- {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $value->slug, $task->slug))) !!}
                  {{Form::button('<span class="task-item-option">Supprimer la tâche</span>', array('type' => 'submit'))}}
                  {!! Form::close() !!} -->
                </div>
              </div>
            </li>
          @endif
        @endforeach
      </ol>
    @endif
  @endforeach
@endsection
