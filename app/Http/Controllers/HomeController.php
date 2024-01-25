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
        $characters= Character::paginate(5, ['*'], 'characters');                        
        $types = Type::paginate(5, ['*'], 'types');         
        $items = Item::paginate(5, ['*'], 'items');
        return view('home', compact('characters','items', 'types'));
    }
}
