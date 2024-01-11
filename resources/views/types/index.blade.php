@extends('layouts.app')


@section('content')
    <main>
        <div class="container">
            <h1 class="py-4">
                Types
            </h1>

            <div class="row">
                {{-- @forelse ($types as $type)
                < div class="col-12 col-md-3 col-lg-4">
                    <div class="card">

                        <span>{{ $type->name }}</span>
                        <span>{{ $type->description }}</span>
                    </div>
                @endforelse --}}
                @forelse ($types as $type)
                <div class="col-12 col-md-3 col-lg-4">
                    <div class="card mb-3 ">
                        {{-- <img src="{{ $character->image }}" alt="{{ $character->name }}"> --}}
                        <div class="card-body">
                            <a href="{{route('types.show',$type->id)}}">
                                <h5>
                                    {{ $type->name }}
                                </h5>
                            </a>
                            <div>{{ substr($type->description,0,100)."..." }}</div>
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
