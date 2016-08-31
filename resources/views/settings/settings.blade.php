@extends('layout')

@section('mainContent')
  <h2>Paramètre du compte</h2>
  <div class="div-change-color">
    <h3 class="title-change-color">Changer de couleur</h3>
    <ul class="select-color">
      <li class="color-1"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '1'] ) }}">Couleur 1</a></li>
      <li class="color-2"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '2'] ) }}">Couleur 2</a></li>
      <li class="color-3"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '3'] ) }}">Couleur 3</a></li>
      <li class="color-4"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '4'] ) }}">Couleur 4</a></li>
      <li class="color-5"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '5'] ) }}">Couleur 5</a></li>
      <li class="color-6"><a class="unlink hide-text" href="{{ action( 'SettingsController@updateColor', ['$number' => '6'] ) }}">Couleur 6</a></li>
    </ul>
  </div>
  <div class="div-change-typo">
    <h3 class="title-change-typo">Changer de typographie</h3>
    <ul>
      <li>Typo</li>
      <li>Typo</li>
      <li>Typo</li>
      <li>Typo</li>
      <li>Typo</li>
    </ul>
  </div>
@endsection
