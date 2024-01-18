@extends('layouts.app')

@section('content')
    <main>

        <div id="create-characters">

            <div class="container">
                <div class="py-5">
                    <h2>Update {{ $character->name }}</h2>
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
                        <form action="{{ route('admin.characters.update', $character->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name"
                                    value="@error('name'){{ old('name') }}@else{{ $character->name }}@enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label" rows="10">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                                @error('description')
{{ old('description') }}@else{{ $character->description }}
@enderror
                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="type_id" class="form-label">Type</label>

                                <select id="type_id" name="type_id"
                                    class="form-select @error('type_id') is-invalid @enderror">
                                    <option value="">Select a type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('type_id', $character->type_id) == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <div class="form-group">
                                    <label>Select Item</label>
                                    @foreach ($items as $item)
                                        <div class="form-check @error('items') is-invalid @enderror">
                                            <input type="checkbox" class="form-check-input" name="items[]"
                                                value="{{ $item->id }}"
                                                @if ($errors->any()) {{ in_array($item->id, old('items', $character->items)) ? 'checked' : '' }}>
                                                @else
                                                {{ $character->items->contains($item->id) ? 'checked' : '' }}> @endif
                                                <label class="form-check-label">
                                            {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('items')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="attack" class="form-label">Attack</label>

                                <input type="text" id="attack" name="attack"
                                    value="@error('attack'){{ old('attack') }}@else{{ $character->attack }}@enderror"
                                    class="form-control @error('attack') is-invalid @enderror" required>
                                @error('attack')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="defence" class="form-label">Defence</label>

                                <input type="text" id="defence" name="defence"
                                    value="@error('defence'){{ old('defence') }}@else{{ $character->defence }}@enderror"
                                    class="form-control @error('defence') is-invalid @enderror" required>
                                @error('defence')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="speed" class="form-label">Speed</label>

                                <input type="text" id="speed" name="speed"
                                    value="@error('speed'){{ old('speed') }}@else{{ $character->speed }}@enderror"
                                    class="form-control @error('speed') is-invalid @enderror" required>
                                @error('speed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="life" class="form-label">Life</label>

                                <input type="text" id="life" name="life"
                                    value="@error('life'){{ old('life') }}@else{{ $character->life }}@enderror"
                                    class="form-control @error('life') is-invalid @enderror" required>
                                @error('life')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <div class="media me-4">
                                    <img class="shadow" width="150" src="{{ asset('storage/' . $character->img) }}"
                                        alt="{{ $character->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                                        name="img" id="image" value="{{ old('img') }}">
                                    @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Cliccando su confirm eliminerai {{ $character->name }}. Sei sicuro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('admin.characters.destroy', $character->slug) }}" method="POST">
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
