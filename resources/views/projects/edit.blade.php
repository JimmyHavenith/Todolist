@extends('layout')

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editer le projet
                </div>
                <div class="panel-body">

                    {!! Form::model($project, array('method' => 'PATCH', 'route' => ['projects.update', $project->slug], 'class' => 'form-horizontal', 'role' => 'form')) !!}
                        @include('projects/partials/_form', array('submit_text' => 'Editer le projet', 'submit_icon' => 'pencil'))
                    {!! Form::close() !!}

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
