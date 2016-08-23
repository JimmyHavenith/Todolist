@extends ('layout')

@section('mainContent')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Se connecter</div>
        <div class="panel-body">
          <form method="POST" class="register" action="/auth/register">
            {!! csrf_field() !!}
            @include('errors.userErrors')
            <div style="margin-bottom: 20px">
              <label for="name">Pseudo</label>
              <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            </div>
            <div style="margin-bottom: 20px">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div style="margin-bottom: 20px">
              <label for="password">Mot de passe</label>
              <input class="form-control" type="password" name="password">
            </div>
            <div style="margin-bottom: 20px">
              <label for="password">Confirmer votre mot de passe</label>
              <input class="form-control" type="password" name="password_confirmation">
            </div>
            <div>
              <button class="btn btn-success" type="submit">S'inscrire</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
