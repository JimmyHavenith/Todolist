@extends ('layout-auth')
@section('title', 'Connexion' )
@section('mainContent')
  <div class="auth">
    <div class="auth-logo">
      <h1>Todolist</h1>
    </div>
    <div class="auth-auth">
      <div class="auth-form">
        <form method="POST" class="register" action="/auth/login">
          {!! csrf_field() !!}
          @include('errors.userErrors')
          <div class="auth-email auth-txt">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
          </div>
          <div class="auth-mdp auth-txt">
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
          </div>
          <div class="auth-checkbox">
            <label>
              <input name="remember" type="checkbox"> Se souvenir de moi
            </label>
          </div>
          <div>
            <button class="auth-submit" type="submit">Se connecter</button>
          </div>
        </form>
      </div>
    </div>
    <div class="auth-register">
      <p>
        Vous n'avez pas encore de compte ? </br>
        <a href="/auth/register">Créer un compte gratuitement</a>
      </p>
    </div>
  </div>
@endsection
