@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">

            <div>
                <div class="d-flex align-items-center  justify-content-between w-25">
                    <h3 class="text-primary">
                        {{ $item->name }}
                    </h3>
                    {{-- bottone di edit --}}
                    <a href="{{route('items.edit', $item->id)}}">
                        <button class="btn btn-success rounded-3 border-0">
                            <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                        </button>
                    </a>
                </div>
                <div>{{ $item->slug }}</div>

                <div>Type: {{ $item->type }}
                    Category: {{ $item->category }}</div>

                <div>Weight: {{ $item->weight }}</div>
                <div>Cost: {{ $item->cost }}</div>
            </div>

    </main>
@endsection
