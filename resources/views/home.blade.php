@extends('layouts.app')
@section('content')
    
    <div class="container py-4">
        {{-- <h1>Home Page</h1> --}}
    <section class="row p-2">
        <div class=" col-12">
            <div class="card">
            <div class="card-header">
                <div class="py-1">
                    <h2 class="mb-0">All Characters</h2>
                </div>
            </div>
            <div class="card-body">
                <table class="table p-3">
                    <thead>
                        <tr>
                            <th>Character Name</th>
                            <th>Character Type</th>
                            <th>Character Item</th>
                            <th>Edit Character</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($characters as $character)
                            <tr>
                                <th>
                                    <a href="{{ route('admin.characters.show', $character->slug) }}">
                                        {{ $character->name }}
                                    </a>
                                </th>
                                <td>
                                    <a
                                        href="{{ route('admin.types.show', $character->type->slug) }}">{{ $character->type->name }}</a>
                                </td>
                                <td>
                                    @foreach ($character->items as $item)
                                        <a href="{{ route('admin.items.show', $item->slug) }}">{{ $item->name }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.characters.edit', $character->slug) }}">
                                        <button class="btn btn-success rounded-3 border-0">
                                            <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div>No categories</div>
                        @endforelse
                    </tbody>                     
                </table>
                {{$characters->links('vendor.pagination.bootstrap-5')}}
                </div>   
            </div>
        </div>        
        <div class="col-6 col-md-6 mt-2">
            <div class=" col-12 card h-100">
                <div class="card-header">
                    <div class="py-1">
                        <h2 class="mb-0">All Types</h2>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table p-3">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <th>
                                        <a href="{{ route('admin.types.show', $type->slug) }}">
                                            {{ $type->name }}
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.characters.edit', $character->slug) }}">
                                            <button class="btn btn-success rounded-3 border-0">
                                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                            </button>
                                        </a>
                                    </td>
                                    
                                </tr>
                            @empty
                                <div>No types</div>
                            @endforelse
                        </tbody>
                    </table>
                    {{$types->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 mt-2">
            <div class=" col-12 card h-100">
                <div class="card-header">
                    <div class="py-1">
                        <h2 class="mb-0">All Items</h2>
                    </div>
                </div>                
                <div class="card-body">
                    <table class="table p-3">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <th>
                                        <a href="{{ route('admin.items.show', $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </th>
                                    <td>
                                        <a href="{{ route('admin.items.edit', $item->slug) }}">
                                            <button class="btn btn-success rounded-3 border-0">
                                                <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                            </button>
                                        </a>
                                    </td>                                    
                                </tr>
                            @empty
                                <div>No item</div>
                            @endforelse
                        </tbody>
                    </table>
                    {{$items->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
          
        </div>   
    </div>     
    </section>
</div>
@endsection
