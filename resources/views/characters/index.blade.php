@extends('layouts.app')


@section('content')
    <main>
        <h1>
            Characters
        </h1>
        <div class="row">
            @forelse ($characters as $character)
                <div class="col-12 col-md-3 col-lg-4">
                    <div class="card">
                        {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                        <div class="card-body">
                            <h5>{{ $character->name }}</h5>
                            <div>{{ $character->description }}</div>
                            <div>Type: {{ $character->description }}</div>

                            <div>ATT:{{ $character->attack }} - DEF:{{ $character->defence }}</div>
                            <div>SPEED:{{ $character->speed }} - LIFE: {{ $character->life }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div>no characters found</div>
            @endforelse
        </div>
    </main>
@endsection
