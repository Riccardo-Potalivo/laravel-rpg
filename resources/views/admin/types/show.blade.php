{{-- pagina di show dei types --}}
@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">
            <div class="row pt-5">
                <div class="col-12 col-lg-8">
                    <div class="d-flex justify-content-between  align-items-center ">
                        <h1 class="pb-4">
                            {{ $type->name }}
                        </h1>
                        {{-- bottone di edit --}}
                        <a href="{{route('admin.types.edit', $type->id)}}">
                            <button class="btn btn-success rounded-3 border-0">
                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                            </button>
                        </a>
                    </div>
                    <h4 class="py-3">
                        Description
                    </h4>
                    <p class="mb-3">{{$type->description}}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
