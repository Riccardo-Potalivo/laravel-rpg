<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->query('name')) {
            $characters = Character::where('name', 'like', $request->query('name') . '%')->with(['items', 'type'])->get();
        } else {
            $characters = Character::with(['items', 'type'])->get();

        }

        return response()->json(
            [
                'success' => true,
                'results' => $characters
            ]
        );
    }

    public function show($slug)
    {
        $character = Character::where('slug', $slug)->with(['items', 'type'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $character
            ]
        );
    }

}
