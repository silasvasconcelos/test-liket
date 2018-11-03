<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class HomeController extends Controller
{
    function index( Request $request )
    {
    	$q = strval($request->get('q'));
    	$players = Player::withoutWord()->filter($q)->get();

    	return view('home.index', compact('players', 'q'));
    }
}
