@extends ('layout-auth')
@section('title', 'Inscription' )
@section('mainContent')
  <div class="auth">
    <div class="auth-logo">
      <h1>minimaList</h1>
    </div>
    <div class="auth-auth">
      <div class="auth-form-register">
        <form method="POST" class="register" action="/auth/register">
          {!! csrf_field() !!}
          @include('errors.userErrors')
          <div class="auth-pseudo auth-txt">
            <label for="name">Pseudo</label>
            <input type="text" name="name" value="{{ old('name') }}">
          </div>
          <div class="auth-email auth-txt">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
          </div>
          <div class="auth-mdp auth-txt">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
          </div>
          <div class="auth-mdp auth-txt">
            <label for="password">Confirmer votre mot de passe</label>
            <input type="password" name="password_confirmation">
          </div>
          <div>
            <button class="auth-submit" type="submit">S'inscrire</button>
          </div>
        </form>
      </div>
      <div class="auth-features">
        <ul>
          <li>
            <span class="auth-features-icon"><img src="../img/projects.png" alt="" /></span>
            <div class="auth-features-desc">
              <h2 class="auth-features-desc-title">Trier vos tâches par projets</h2>
              <p>
                Vous souhaitez lister toutes les choses à faire pour un projet ?
                Todolist vous permet de suivre l’accomplissement de vos tâches de façon simple et pratique.
              </p>
            </div>
          </li>
          <li>
            <span class="auth-features-icon"><img src="../img/etiquettes.png" alt="" /></span>
            <div class="auth-features-desc">
              <h2 class="auth-features-desc-title">Organiser vos tâches par étiquettes</h2>
              <p>
                En plus d'organiser vos tâches par projets ou par date, vous pouvez également les organiser grâce au système d'étiquette.
              </p>
            </div>
          </li>
          <li>
            <span class="auth-features-icon"><img src="../img/responsive.png" alt="" /></span>
            <div class="auth-features-desc">
              <h2 class="auth-features-desc-title">Disponible sur tous les supports</h2>
              <p>
                Vous êtes sur ordinateur, mac, tablette ou smartphone ? Aucuns soucis, Todolist s'adapte à tous les supports !
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
