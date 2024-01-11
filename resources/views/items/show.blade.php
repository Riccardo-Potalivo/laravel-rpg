@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">

            <div>
                <h3>{{ $item->name }}</h3>
                <div>{{ $item->slug }}</div>

                <div>Type: {{ $item->type }}
                    Category: {{ $item->category }}</div>

                <div>Weight: {{ $item->weight }}</div>
                <div>Cost: {{ $item->cost }}</div>
            </div>

    </main>
@endsection
