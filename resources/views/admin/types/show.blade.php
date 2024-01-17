{{-- pagina di show dei types --}}
@extends('layouts.app')

@section('content')
    <main>
        <div id="type-detail" class="container py-5">
            <div class="row pt-5">

                <div class="col-12 col-xl-4">
                    <div class="img-box">
                        @if ($type->image)
                            <img src="{{ $type->image }}" alt="{{ $type->name }}">
                        @else
                            <div class="h-100 d-flex justify-content-center align-items-center">
                                <div class="text-uppercase fs-4">No image</div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h1 class="pb-4">
                            {{ $type->name }}
                        </h1>
                        {{-- bottone di edit --}}
                        <a href="{{ route('admin.types.edit', $type->id) }}">
                            <button class="btn edit rounded-3 border-0 mx-5">
                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                <span>Edit Type</span>
                            </button>
                        </a>
                    </div>
                    <h4 class="py-3">
                        Description
                    </h4>
                    <p class="mb-3">{{ $type->description }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
