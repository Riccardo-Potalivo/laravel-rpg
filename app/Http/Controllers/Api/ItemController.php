<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //
    public function index(Request $request)
    {

        $items = Item::with(['characters'])->get();
        return response()->json(
            [
                'success' => true,
                'results' => $items
            ]
        );
    }

    public function show($slug)
    {

        $item = Item::where('slug', $slug)->with(['characters'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $item
            ]
        );
    }
}