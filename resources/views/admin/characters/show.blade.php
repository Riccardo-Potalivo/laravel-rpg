@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">

            <div class="row pt-5">

                <div class="col-12 col-lg-4">
                    <div class="img-box">
                        {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="d-flex align-items-center">
                        <h1>{{ $character->name }}</h1>
                        {{-- bottone di edit --}}
                        <a href="{{route('admin.characters.edit', $character->id)}}">
                            <button class="btn btn-success rounded-3 border-0 mx-5">
                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                            </button>
                        </a>
                    </div>

                    <h4 class="text-uppercase me-3">Type: {{ $character->type_id }}</h4>
                    <div class="mb-3">ATT:{{ $character->attack }} - DEF:{{ $character->defence }}</div>
                    <div class="mb-3">SPEED:{{ $character->speed }} - LIFE: {{ $character->life }}</div>
                    <h4>Description</h4>
                    <p class="mb-3">{{ $character->description }}</p>


                </div>

            </div>

    </main>
@endsection
