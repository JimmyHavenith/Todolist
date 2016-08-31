<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use App\user;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function index()
  {
    return view('settings/settings');
  }

  public function updateColor( $number ){
    $user = User::findOrFail( \Auth::user()->id );
    $user->color = 'color_'.$number;
    $user->save();
    return redirect()->back();
  }

  public function updateFont( $number ){
    $user = User::findOrFail( \Auth::user()->id );
    $user->font = 'font_'.$number;
    $user->save();
    return redirect()->back();
  }

}
