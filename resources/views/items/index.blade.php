@extends('layouts.app')


@section('content')
    <main>
        <h1>
            Items
        </h1>
        <div class="row">
            @forelse ($items as $item)
                <div class="col-12 col-md-3 col-lg-4">
                    <div class="card">
                        {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                        <div class="card-body">
                            <h5><a href="{{ route('items.show', $item->id) }}">
                                    {{ $item->name }}
                                </a></h5>

                            <div>{{ $item->slug }}</div>

                            <div>Type: {{ $item->type }}
                                Category: {{ $item->category }}</div>

                            <div>Weight: {{ $item->weight }}</div>
                            <div>Cost: {{ $item->cost }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div>no items found</div>
            @endforelse
        </div>
    </main>
@endsection
