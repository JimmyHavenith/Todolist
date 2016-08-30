@extends('layout')

@section('mainContent')
  <h2>Créer un tag</h2>
  <div class="task-add">
    {!! Form::model(new App\Tag, array('route' => ['tags.store'], 'role' => 'form')) !!}
        @include('tags/partials/_form', array('submit_text' => 'Créer le tag'))
    {!! Form::close() !!}
  </div>
@endsection
