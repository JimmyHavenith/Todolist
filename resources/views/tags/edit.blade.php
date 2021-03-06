@extends('layout')
@section('title', 'Modifier une étiquette' )
@section('mainContent')

<h2>Modifier l'étiquette "{{ $tag->name }}"</h2>
<div class="task-add">
  {!! Form::model($tag, array('method' => 'PATCH', 'route' => ['tags.update', $tag->slug], 'class' => 'form-horizontal', 'role' => 'form')) !!}
      @include('tags/partials/_form', array('submit_text' => 'Editer le tag', 'submit_icon' => 'pencil'))
  {!! Form::close() !!}
</div>

@endsection
