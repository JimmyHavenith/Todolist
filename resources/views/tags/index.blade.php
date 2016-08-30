@extends('layout')

@section('mainContent')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
              <div class="row">
                <div class="panel-heading">
                  Projets
                  <a href="{{ url('/tasks/create') }}" class="btn btn-sm btn-primary btn-create pull-right" type="button">
                    <span class="fa fa-cog fa-plus" aria-hidden="true"></span> Nouveau Projet
                  </a>
                </div>
              </div>
            </div>
            <div class="panel-body">
            @if ( !$tasks->count() )
              <p>
                vous n'avez aucuns projets
              </p>
            @else
              <table class="table table-striped table-bordered table-list">
                <thead>
                  <tr>
                    <th class="hidden-xs">ID</th>
                    <th>Nom</th>
                    <th>Tâches</th>
                    <th class="text-center"><span class="fa fa-cog fa-fw" aria-hidden="true"></span></th>
                  </tr>
                </thead>
              <tbody>
                @foreach( $tasks as $tag )
                  <tr>
                    <td class="hidden-xs">
                      {{ $tag->id }}
                    </td>
                    <td>
                      <a href="{{ route('tasks.show', $tag->slug) }}">{{ $tag->name }}</a>
                    </td>
                    <td >
                      @if ( !$tag->tasks->count() )
                        <p>
                          None
                        </p>
                      @else
                        @foreach( $tag->tasks as $task )
                          <a href="{{ route('tasks.tasks.show', [$tag->slug, $task->slug]) }}" class="hidden-xs">
                            {{ $task->name }}
                            <br />
                          </a>
                        @endforeach
                        <a href="{{ route('tasks.show', $tag->slug) }}" class="visible-xs">
                          {{ $tag->tasks->count() }}
                        </a>
                      @endif
                    </td>
                    <td align="center">
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('tasks.destroy', $tag->slug))) !!}
                      <a href="{{ route('tasks.show', $tag->slug) }}" class="btn btn-default">
                        <span class="fa fa-fw fa-eye" aria-hidden="true"></span>
                        <span class="hidden-xs">
                          Voir le
                        </span>
                        <span class="hidden-sm hidden-xs">
                          Projet
                        </span>
                      </a>
                      <a href="{{ route('tasks.edit', array($tag->slug)) }}" class="btn btn-warning">
                        <span class="fa fa-fw fa-pencil" aria-hidden="true"></span>
                        <span class="hidden-xs">
                          Editer le
                        </span>
                        <span class="hidden-sm hidden-xs">
                          Projet
                        </span>
                      </a>
                      {{Form::button('<span class="fa fa-fw fa-trash" aria-hidden="true"></span> <span class="hidden-xs">Supprimer le</span> <span class="hidden-sm hidden-xs">Projet</span>', array('type' => 'submit', 'class' => 'btn btn-danger'))}}
                    {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
