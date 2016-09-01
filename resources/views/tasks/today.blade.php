@extends('layout')
@section('title', 'Aujourd hui' )
@section('mainContent')
  <h2>Aujourd'hui</h2>
  @if( !empty($todayTasks) )
    @foreach( $project as $value )
      @if ( in_array( $value->id, $todayProject) )
        <h3>{{ $value->name }}</h3>
        <ol>
          @foreach( $todayTasks as $task )
            @if( $task->project_id == $value->id )
              <li>
                <div class="tasks-item">
                  <label><input type="checkbox" id="cbox1" value="premiere_checkbox"><span class="tasks-item-name">{{ $task->name }}</span></label>
                  <div class="tasks-item-button">
                    <a title="voir la tâche" class="tasks-item-option task-item-see" href="{{ route('projects.tasks.show', array($value->slug, $task->slug)) }}">
                      <span class="tasks-item-option-logo"><img src="../img/icon-see.png" alt="icone pour voir la tâche" /></span><span class="tasks-item-option-txt">Voir la Tâche</span>
                    </a>
                    <a title="editer la tâche" class="tasks-item-option" href="{{ route('projects.tasks.edit', array($value->slug, $task->slug)) }}">
                      <span class="tasks-item-option-logo"><img src="../img/icon-edit.png" alt="icone pour éditer la tâche" /></span><span class="tasks-item-option-txt">Editer la Tâche</span>
                    </a>
                    <a title="Supprimer la tâche" class="tasks-item-option task-item-delete" href="{{ action('TasksController@destroy', ['id' => $task->id]) }}">
                      <span class="tasks-item-option-logo"><img src="../img/icon-delete.png" alt="icone pour supprimer la tâche" /></span><span class="tasks-item-option-txt">Supprimer la Tâche</span>
                    </a>
                  </div>
                  <div class="tasks-item-infos">
                    <div class="tasks-item-infos-date">
                      <span class="tasks-item-infos-icon">
                          <img src="../img/icon-date.png" alt="icone pour l'échéance de la tâche" />
                      </span>
                      <div class="task-infos">
                        <p>
                          @if( $task->date )
                            {{ $task->date }}
                          @else
                            Il n'y a pas d'échéance
                          @endif
                        </p>
                      </div>
                    </div>
                    <div class="tasks-item-infos-desc">
                      <span class="tasks-item-infos-icon">
                        <img src="../img/icon-desc.png" alt="icone pour la description de la tâche" />
                      </span>
                      <div class="task-infos">
                        <p>
                          @if( $task->description )
                            {{ $task->description }}
                          @else
                            Il n'y a pas de description
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
  @else
  <h2>Il n'y a pas de tâches à faire pour aujourd'hui</h2>
@endif
@endsection
