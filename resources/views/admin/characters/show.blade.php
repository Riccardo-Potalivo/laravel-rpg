@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">

            <div class="row pt-5">

                <div class="col-12 col-xl-4 d-flex justify-content-center ">
                    <div class="img-box">
                        @if ($character->img)
                            <img src="{{ asset('storage/' . $character->img) }}" alt="{{ $character->name }}">
                        @else
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <div class="text-uppercase fs-4">No image</div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-xl-8 ">
                    <div class="d-flex align-items-center justify-content-between ">
                        <h1>{{ $character->name }}</h1>

                        {{-- bottone di edit --}}
                        <a href="{{ route('admin.characters.edit', $character->slug) }}">
                            <button class="btn edit rounded-3 border-0 mx-5">
                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                <span>Edit Character</span>
                            </button>
                        </a>
                    </div>


                    <h4 class="text-uppercase me-3">Type: {{ $character->type->name }}</h4>
                    <div class="mb-3">ATT:{{ $character->attack }} - DEF:{{ $character->defence }}</div>
                    <div class="mb-3">SPEED:{{ $character->speed }} - LIFE: {{ $character->life }}</div>

                    <h5>Items:</h5>
                    <ul class="mb-3">
                        @if ($character->items)
                            @foreach ($character->items as $item)
                                <li>
                                    {{ $item->name }}

                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <h4>Description:</h4>
                    <p class="mb-3">{{ $character->description }}</p>



                </div>

            </div>

    </main>
@endsection
