<div>
	{{ Form::label('name', 'Nom', ['class' => 'task-edit-form-label']) }}
	<div>
		{{ Form::text('name', NULL, array_merge(['class' => 'task-edit-form', 'placeholder' => 'Nom du projet'])) }}
	</div>
</div>

<div>
    <div>
		{{ Form::button('Créer le projet', array('class'=>'task-edit-form-submit', 'type'=>'submit')) }}
    </div>
</div>
