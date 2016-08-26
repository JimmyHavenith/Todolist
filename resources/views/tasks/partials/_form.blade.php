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
  <div>
	   {{ Form::button('Modifier la tâche', array('class' => 'task-edit-form-submit', 'type'=>'submit')) }}
  </div>
</div>
