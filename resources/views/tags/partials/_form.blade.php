<div>
	{{ Form::label('name', 'Nom', ['class' => 'task-edit-form-label']) }}
	<div>
		{{ Form::text('name', NULL, array_merge(['class' => 'task-edit-form', 'placeholder' => 'Nom du tag'])) }}
	</div>
</div>

<div>
  <div>
	{{ Form::button('Créer le tag', array('class'=>'task-edit-form-submit', 'type'=>'submit')) }}
  </div>
</div>
