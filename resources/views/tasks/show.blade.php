@extends('layout')

@section('mainContent')
  <h2>
    {{ $task->name }}
  </h2>
  <p>
    {{ $task->description }}
  </p>
@endsection
