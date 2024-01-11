{{-- pagina di show dei types --}}
@extends('layouts.app')

@section('content')
    <main>
        <div id="character-detail" class="container py-5">
            <div class="row pt-5">
                <div class="col-12 col-lg-8">
                    <h1 class="pb-4">
                        {{ $type->name }}
                    </h1>
                    <h4 class="py-3">
                        Description
                    </h4>
                    <p class="mb-3">{{$type->description}}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
