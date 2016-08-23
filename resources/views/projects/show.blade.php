@extends('layout')

@section('mainContent')
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default panel-table">
            <div class="panel-heading">
              <div class="row">
                <div class="panel-heading">
                  {{ $project->name }}
                  <a href="/projects/{{$project->slug}}/tasks/create" class="btn btn-sm btn-primary btn-create pull-right" type="button">
                    <span class="fa fa-plus" aria-hidden="true"></span> Nouvelle tâche
                  </a>
                </div>
              </div>
            </div>
            <div class="panel-body">
                @if ( !$project->tasks->count() )
                  Il n'y a pas de tâches <a href="/projects/{{$project->slug}}/tasks/create">Créer une tâche</a>.
                @else
              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>
                    <th>Tâche</th>
                    <th class="hidden-xs">Description</th>
                    <th class="text-center"><span class="fa fa-cog fa-fw" aria-hidden="true"></span></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $project->tasks as $task )
                    <tr>
                      <td>
                        <a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">
                            {{ $task->name }}
                        </a>
                      </td>
                      <td class="hidden-xs">
                          {{ $task->description }}
                      </td>
                      <td align="center">
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $project->slug, $task->slug))) !!}
                          <a href="{{ route('projects.tasks.show', array($project->slug, $task->slug)) }}" class="btn btn-default">
                            <span class="fa fa-fw fa-eye" aria-hidden="true"></span>
                            <span class="hidden-xs">
                                Voir la
                            </span>
                            <span class="hidden-sm hidden-xs">
                                Tâche
                            </span>
                          </a>
                          <a href="{{ route('projects.tasks.edit', array($project->slug, $task->slug)) }}" class="btn btn-warning">
                            <span class="fa fa-fw fa-pencil" aria-hidden="true"></span>
                            <span class="hidden-xs">
                              Editer la
                            </span>
                            <span class="hidden-sm hidden-xs">
                              Tâche
                            </span>
                          </a>
                          {{Form::button('<span class="fa fa-trash fa-fw" aria-hidden="true"></span> <span class="hidden-xs">Delete</span> <span class="hidden-sm hidden-xs">Task</span>', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
          <div class="panel-footer">
            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-info" type="button">
              <span class="fa fa-reply" aria-hidden="true"></span> Retourner aux projets
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
