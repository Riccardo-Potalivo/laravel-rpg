<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreItemRequest $request)
    {
        $formData = $request->validated();

        if ($request->hasFile('img')) {
            $image = Storage::put('item_image', $formData['img']);
            $formData['img'] = $image;
        }
        $slug = Item::getSlug($formData['name']);

        $formData['slug'] = $slug;

        $userId = auth()->id();
        $formData['user_id'] = $userId;

        $newItem = Item::create($formData);

        return to_route('admin.items.show', $newItem->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\View\View;
     *
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     *
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $formData = $request->validated();

        $formData['slug'] = $item->slug;
        if ($item->name !== $formData['name']) {
            $slug = Item::getSlug($formData['name']);
            $formData['slug'] = $slug;

        }

        if ($request->hasFile('img')) {
            if ($item->img) {
                Storage::delete($item->img);
            }
            $image = Storage::put('item_image', $formData['img']);
            $formData['img'] = $image;
        }
        $formData['user_id'] = $item->user_id;

        $item->fill($formData);

        $item->update();

        return to_route('admin.items.show', $item->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if ($item->image) {
            Storage::delete($item->image);
        }
        $item->delete();

        return to_route('admin.items.index')->with('message', "il prodotto $item->title è stato eliminato");
    }
}
