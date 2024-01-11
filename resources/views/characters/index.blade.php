@extends('layouts.app')


@section('content')
    <main>
        <div class="container">
            <div class="d-flex justify-content-between  align-items-center ">
                <h1 class="py-4">
                    Characters
                </h1>
                {{-- bottone della create --}}
                <div class="d-flex align-items-center">
                    <h4>
                        Can't find your character?
                    </h4>
                    <a href="{{route('characters.create')}}">
                        <button class="btn btn-primary rounded-3 mx-4 ">
                            Add new one
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">
                @forelse ($characters as $character)
                    <div class="col-12 col-md-3 col-lg-4">

                        <div class="card mb-3">

                            {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                            <div class="card-body h-100">

                                <h5>
                                    <a href="{{ route('characters.show', $character->id) }}">{{ $character->name }} </a>
                                </h5>
                                <div>{{ $character->description }}</div>
                                <div>Type: {{ $character->description }}</div>
                                <div>ATT:{{ $character->attack }} - DEF:{{ $character->defence }}</div>
                                <div>SPEED:{{ $character->speed }} - LIFE: {{ $character->life }}</div>

                                <div class="d-flex mt-2">
                                    {{-- bottone di edit --}}
                                    <a href="{{route('characters.edit', $character->id)}}">
                                        <button class="btn btn-success rounded-3 border-0 me-2">
                                            <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div>no characters found</div>
                @endforelse
            </div>
        </div>
    </main>
@endsection
