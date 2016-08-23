@extends('layout')

@section('mainContent')
  <div>
    <h1 style="text-align: center;">Bienvenue sur Todolist</h1>
    <p style="text-align: center;">
      Connectes toi pour accéder à ton gestionnaire de page
    </p>
    <p style="text-align: center;">
      Pour se connecter c'est par <a href="/auth/login">ici</a>
    </p>
    <p style="text-align: center;">
      Pour s'inscrire c'est par <a href="/auth/register">ici</a>
    </p>
  </div>
@endsection
