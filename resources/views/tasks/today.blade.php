@extends('layout')

@section('mainContent')
  <h2>Aujourd'hui</h2>
  @foreach( $project as $value )
    @if ( in_array( $value->id, $todayProject) )
      <h3>{{ $value->name }}</h3>
      <ol>
        @foreach( $todayTasks as $task )
          @if( $task->project_id == $value->id )
            <li>{{ $task->name }}</li>
          @endif
        @endforeach
      </ol>
    @endif
  @endforeach
@endsection
