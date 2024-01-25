<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Type;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $characters= Character::simplePaginate(5);                        
        $types = Type::simplePaginate(5);         
        $items = Item::simplePaginate(5);
        return view('home', compact('characters','items', 'types'));
    }
}
