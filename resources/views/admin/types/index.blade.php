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
                    <a href="{{ route('admin.types.create') }}">
                        <button class="btn add-btn rounded-3 mx-4 ">
                            Add new one
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">

                @forelse ($types as $type)
                    <div class="col-12 col-md-6 col-xl-4 mb-4">
                        <div class="card">

                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div class="img-box">
                                            @if ($type->img)
                                                <img src="{{ asset('storage/' . $type->img) }}" alt="{{ $type->name }}">
                                            @else
                                                <div class="h-100 d-flex justify-content-center align-items-center">
                                                    <div class="text-uppercase">No image</div>
                                                </div>
                                            @endif
                                        </div>
                                        <a href="{{ route('admin.types.show', $type->slug) }}">
                                            <h5>
                                                {{ $type->name }}
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="d-flex mt-2">
                                        {{-- bottone di edit --}}
                                        <a href="{{ route('admin.types.edit', $type->slug) }}">
                                            <button class="btn edit rounded-3 border-0">
                                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                            </button>
                                        </a>
                                    </div>

                                </div>


                                <div>{{ substr($type->description, 0, 100) . '...' }}</div>

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
