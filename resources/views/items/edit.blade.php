@extends('layouts.app')

@section('content')
    <main>

        <div id="create-items">

            <div class="container">
                <div class="py-5">
                    <h2>Update {{ $item->name }}</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card p-2">
                        <form action="{{ route('items.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name"
                                    value="@error('name'){{ old('name') }}@else{{ $item->name }}@enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--
                            <div class="mb-3">
                                <label for="description" class="form-label" rows="10">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    value="{{ old('description') }}">

                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>

                                <input type="text" id="slug" name="slug"
                                    value="@error('slug'){{ old('slug') }}@else{{ $item->slug }}@enderror"
                                    class="form-control @error('slug') is-invalid @enderror" required>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>

                                <input type="text" id="category" name="category"
                                    value="@error('category'){{ old('category') }}@else{{ $item->category }}@enderror"
                                    class="form-control @error('category') is-invalid @enderror" required>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>

                                <input type="text" id="type" name="type"
                                    value="@error('type'){{ old('type') }}@else{{ $item->type }}@enderror"
                                    class="form-control @error('type') is-invalid @enderror" required>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>

                                <input type="text" id="weight" name="weight"
                                    value="@error('weight'){{ old('weight') }}@else{{ $item->weight }}@enderror"
                                    class="form-control @error('weight') is-invalid @enderror" required>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>

                                <input type="text" id="cost" name="cost"
                                    value="@error('cost'){{ old('cost') }}@else{{ $item->cost }}@enderror"
                                    class="form-control @error('cost') is-invalid @enderror" required>
                                @error('cost')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete_button">Delete</button>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="delete_button" tabindex="-1" aria-labelledby="delete_button_label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delete_button_label">Conferma</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Cliccando su confirm il prodotto verrà eliminato.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>

@endsection
