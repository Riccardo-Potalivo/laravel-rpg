<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{
    //
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index', ['games' => $games]);
    }
}