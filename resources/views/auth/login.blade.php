@extends ('layout')
@section('title', 'Connexion' )
@section('mainContent')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Se connecter</div>
          <div class="panel-body">
            <form method="POST" class="register" action="/auth/login">
              {!! csrf_field() !!}
              @include('errors.userErrors')
              <div style="margin-bottom: 20px;">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
              </div>
              <div style="margin-bottom: 20px;">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" name="password" id="password">
              </div>
              <div style="margin-bottom: 20px;" class="checkbox">
                <label>
                  <input name="remember" type="checkbox"> Se souvenir de moi
                </label>
              </div>
              <div>
                <button class="btn btn-success" type="submit">Se connecter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
