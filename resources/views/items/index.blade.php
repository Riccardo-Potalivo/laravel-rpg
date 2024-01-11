@extends('layouts.app')


@section('content')
    <main>
        <div class="container">
            <div class="d-flex justify-content-between  align-items-center ">
                <h1 class="py-4">
                    Items
                </h1>
                {{-- bottone della create --}}
                <div class="d-flex align-items-center">
                    <h4>
                        Can't find your item?
                    </h4>
                    <a href="{{route('items.create')}}">
                        <button class="btn btn-primary rounded-3 mx-4 ">
                            Add new one
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-12 col-md-3 col-lg-4">
                        <div class="card mb-3">
                            {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                            <div class="card-body h-100">
                                <h5><a href="{{ route('items.show', $item->id) }}">
                                        {{ $item->name }}
                                    </a></h5>
                                <div>{{ $item->slug }}</div>
                                <div>Type: {{ $item->type }}
                                    Category: {{ $item->category }}</div>
                                <div>Weight: {{ $item->weight }}</div>
                                <div>Cost: {{ $item->cost }}</div>
                                <div class="d-flex mt-2">
                                    {{-- bottone di edit --}}
                                    <a href="{{route('items.edit', $item->id)}}">
                                        <button class="btn btn-success rounded-3 border-0 me-2">
                                            <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>no items found</div>
                @endforelse
            </div>
        </div>
    </main>
@endsection
