<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    //
    public function index(Request $request)
    {



        $types = Type::with(['characters'])->get();
        return response()->json(
            [
                'success'=>true,
                'results'=>$types
            ]
        );
    }

    public function show($slug)
    {

        $type = Type::where('slug', $slug)->with(['characters'])->first();
        return response()->json(
            [
                'success'=>true,
                'results'=>$type
            ]
        );
    }
}
