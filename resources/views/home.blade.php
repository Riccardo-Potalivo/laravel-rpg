@extends('layouts.app')
@section('content')
    @guest
        <div class="text-center mt-5">
            <h2>Welcome to your personal</h2>
            <h1>Shadow's Justice <br> Admin Page</h1>
        </div>
        <div class="container ">
            <div class="card d-flex justify-content-between align-content-between mt-5">
                <div class="row">
                    <div class="col-6 d-flex flex-column p-4">
                        <h3 class="text-center">Please Login <br>to access all the funcionalities</h3>
                        <button class="btn m-auto"><a href="{{ route('login') }}" class="text-light">To Login</a></button>
                    </div>
                    <div class="col-6 d-flex flex-column p-4">
                        <h3 class="text-center">Go to <br>
                            Shadow's Justice Website
                        </h3>
                        <button class="btn m-auto p-2"><a href="http://localhost:5174/" class="text-light">To Shadow's
                                Justice</a></button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @else
        <div class="container py-4">
            {{-- <h1>Home Page</h1> --}}

            <section class="row p-2">
                <div class=" col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="py-1">
                                <h2 class="mb-0 ">All Characters</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table p-3">
                                <thead>
                                    <tr>
                                        <th>Character Name</th>
                                        <th>Character Type</th>
                                        <th>Character Item</th>
                                        <th>Edit </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
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
                                                    <a
                                                        href="{{ route('admin.items.show', $item->slug) }}">{{ $item->name }}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.characters.edit', $character->slug) }}">
                                                    <button class="btn rounded-3 border-0">
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
                            {{ $characters->links('vendor.pagination.bootstrap-5') }}
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
                                                    <button class="btn rounded-3 border-0">
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
                            {{ $types->links('vendor.pagination.bootstrap-5') }}
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
                                                    <button class="btn rounded-3 border-0">
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
                            {{ $items->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>

                </div>
        </div>
        </section>
        </div>
    @endguest
@endsection
