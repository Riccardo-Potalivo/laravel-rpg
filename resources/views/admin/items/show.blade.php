@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">

            <div class="row pt-5">
                <div class="col-12 col-xl-4">
                    <div class="img-box">
                        @if ($item->img)
                            <img src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name }}">
                        @else
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <div class="text-uppercase fs-4">No image</div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="text-primary">
                            {{ $item->name }}
                        </h1>

                        {{-- bottone di edit --}}
                        <a href="{{ route('admin.items.edit', $item->id) }}">
                            <button class="btn edit rounded-3 border-0 mx-5">
                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                <span>Edit Item</span>
                            </button>
                        </a>
                    </div>
                    <div>Type: {{ $item->type }}</div>
                    <div> Category: {{ $item->category }}</div>
                    <div>Weight: {{ $item->weight }}</div>
                    <div>Cost: {{ $item->cost }}</div>
                </div>
            </div>

    </main>
@endsection
