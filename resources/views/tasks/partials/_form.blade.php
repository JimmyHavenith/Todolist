<div>
	{{ Form::label('name', 'Nom', ['class' => 'task-edit-form-label']) }}
	<div>
		{{ Form::text('name', NULL, array_merge(['class' => 'task-edit-form', 'placeholder' => 'Nom de la tâche'])) }}
	</div>
</div>

<div>
	{{ Form::label('description', 'Description', ['class' => 'task-edit-form-label']) }}
	<div>
		{{ Form::textarea('description', NULL, array_merge(['class' => 'task-edit-form', 'placeholder' => 'Description de la tâche'])) }}
	</div>
</div>

<div>
	{{ Form::label('date', 'Écheance', ['class' => 'task-edit-form-label']) }}
	<div>
		{!! Form::text('date', NULL, array_merge(['class' => 'task-edit-form-date', 'id' => 'datepicker', 'placeholder' => '08/26/2016'])) !!}
	</div>
</div>

<div>
	@if( count($tags) )
		{{ Form::label('tag', 'Etiquette', ['class' => 'task-edit-form-label']) }}
		<div>
			<select class="" name="tag_id">
				<option value="0">aucun tag</option>
					@foreach( $tags as $tag )
						@if( $task->tag_id == $tag->id )
							<option value="{{ $tag->id }}" selected="selected">{{ $tag->name }}</option>
							@else
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endif
					@endforeach
			</select>
		</div>
	@else
		<p>
			Pas d'étiquettes existantes
		</p>
	@endif
</div>


<div>
  <div>
	   {{ Form::button('Modifier la tâche', array('class' => 'task-edit-form-submit', 'type'=>'submit')) }}
  </div>
</div>
