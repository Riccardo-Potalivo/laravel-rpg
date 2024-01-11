@extends('layouts.app')


@section('content')
    <main>
        <div class="container">
            <div class="d-flex justify-content-between  align-items-center ">
                <h1 class="py-4">
                    Types
                </h1>
                {{-- bottone della create --}}
                <div class="d-flex align-items-center">
                    <h4>
                        Can't find your type?
                    </h4>
                    <a href="{{route('types.create')}}">
                        <button class="btn btn-primary rounded-3 mx-4 ">
                            Add new one
                        </button>
                    </a>
                </div>
            </div>
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
                        <div class="card-body h-100">
                            <a href="{{route('types.show',$type->id)}}">
                                <h5>
                                    {{ $type->name }}
                                </h5>
                            </a>
                            <div>{{ substr($type->description,0,100)."..." }}</div>
                            {{-- bottone di edit --}}
                            <a href="{{route('types.edit', $type->id)}}">
                                <button class="btn btn-success rounded-3 border-0 mt-2">
                                    <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                </button>
                            </a>
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
