<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Game;

class HomeController extends Controller
{
    function index( Request $request )
    {
    	$q = strval($request->get('q'));
    	$players = Player::withoutWord()->filter($q)->get();

    	return view('home.index', compact('players', 'q'));
    }

    function reports(Request $request)
    {
    	$games = Game::all();

    	if (strtoupper($request->get('type')) === 'JSON') {
    		return $games;	
    	}
    	
    	return view('home.reports', compact('games'));
    }
}
