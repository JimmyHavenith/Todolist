@extends('layout')

@section('mainContent')
  <h2>Aujourd'hui</h2>

  @foreach( $project as $value )
    @if ( in_array( $value->id, $todayProject) )
      <h3><a href="#">{{ $value->name }}</a></h3>
      <ol>
        @foreach( $todayTasks as $task )
          @if( $task->project_id == $value->id )
            <li>
              <div class="tasks-item">
                <label><input type="checkbox" id="cbox1" value="premiere_checkbox"><span class="tasks-item-name">{{ $task->name }}</span></label>
                <div class="tasks-item-button">
                  <a title="voir la tâche" class="tasks-item-option" href="{{ route('projects.tasks.show', array($value->slug, $task->slug)) }}">
                    <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
                  </a>
                  <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($value->slug, $task->slug)) }}">
                    <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
                  </a>
                  <a title="Supprimer la tâche" class="tasks-item-option" href="">
                    <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
                  </a>
                  <!-- {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $value->slug, $task->slug))) !!}
                  {{Form::button('<span class="task-item-option">Supprimer la tâche</span>', array('type' => 'submit'))}}
                  {!! Form::close() !!} -->
                </div>
                <div class="tasks-item-infos">
                  <div class="tasks-item-infos-date">
                    <span class="tasks-item-infos-icon">
                        <img src="../img/icon-date.png" alt="" />
                    </span>
                    <div class="task-infos">
                      <p>
                        @if( $task->date )
                          {{ $task->date }}
                        @else
                          Ajouter une échéance
                        @endif
                      </p>
                    </div>
                  </div>
                  <div class="tasks-item-infos-desc">
                    <span class="tasks-item-infos-icon">
                      <img src="../img/icon-desc.png" alt="" />
                    </span>
                    <div class="task-infos">
                      <p>
                        @if( $task->description )
                          {{ $task->description }}
                        @else
                          Ajouter une description
                        @endif
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          @endif
        @endforeach
      </ol>
    @endif
  @endforeach
@endsection
