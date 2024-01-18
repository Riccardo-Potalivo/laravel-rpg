<?php

namespace App\Http\Controllers\Admin;

use App\Models\Character;
use App\Models\Type;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all();

        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();

        return view('admin.characters.create', compact('types', 'items'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreCharacterRequest $request)
    {
        $formData = $request->validated();
        if ($request->hasFile('img')) {
            $image = Storage::put('character_image', $formData['img']);
            $formData['img'] = $image;
        }

        $userId = Auth::id();
        $formData['user_id'] = $userId;

        $newCharacter = Character::create($formData);

        if ($request->has('items')) {
            $newCharacter->items()->attach($request->items);
        }

        return to_route('admin.characters.show', $newCharacter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\View\View;
     *
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     *
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        $items = Item::all();

        return view('admin.characters.edit', compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $formData = $request->validated();
        if ($request->hasFile('img')) {
            if ($character->img) {
                Storage::delete($character->img);
            }
            $image = Storage::put('character_image', $formData['img']);
            $formData['img'] = $image;
        }
        $formData['user_id'] = $character->user_id;


        $character->fill($formData);

        $character->update();

        if ($request->has('items')) {
            $character->items()->sync($request->items);
        } else {
            $character->items()->detach();
        }

        return to_route('admin.characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        if ($character->image) {
            Storage::delete($character->image);
        }
        $character->delete();

        return to_route('admin.characters.index')->with('message', "il prodotto $character->title è stato eliminato");
    }
}
