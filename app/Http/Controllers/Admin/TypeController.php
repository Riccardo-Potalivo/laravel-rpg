<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreTypeRequest $request)
    {
        $formData = $request->validated();
        if ($request->hasFile('img')) {
            $image = Storage::put('type_image', $formData['img']);
            $formData['img'] = $image;
        }

        $userId = auth()->id();
        $formData['user_id'] = $userId;

        $newType = Type::create($formData);

        return to_route('admin.types.show', $newType->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\View\View;
     *
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     *
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $formData = $request->validated();


        if ($request->hasFile('img')) {
            if ($type->img) {
                Storage::delete($type->img);
            }
            $image = Storage::put('type_image', $formData['img']);
            $formData['img'] = $image;
        }
        $formData['user_id'] = $type->user_id;

        $type->fill($formData);

        $type->update();

        return to_route('admin.types.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {

        if ($type->img) {
            Storage::delete($type->img);
        }
        $type->delete();

        return to_route('admin.types.index')->with('message', "il prodotto $type->title è stato eliminato");
    }
}
