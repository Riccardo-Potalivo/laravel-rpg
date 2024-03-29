@extends('layouts.app')

@section('content')
    <main>

        <div id="create-characters">

            <div class="container">
                <div class="py-5">
                    <h2>Add a new character</h2>
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
                        <form action="{{ route('admin.characters.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label" rows="10">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
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
                                            {{ old('type_id') == $type->id ? 'selected' : '' }}>
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
                                                {{ in_array($item->id, old('items', [])) ? 'checked' : '' }}>
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

                                <input type="text" id="attack" name="attack" value="{{ old('attack') }}"
                                    class="form-control @error('attack') is-invalid @enderror">
                                @error('attack')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="defence" class="form-label">Defence</label>

                                <input type="text" id="defence" name="defence" value="{{ old('defence') }}"
                                    class="form-control @error('defence') is-invalid @enderror">
                                @error('defence')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="speed" class="form-label">Speed</label>

                                <input type="text" id="speed" name="speed" value="{{ old('speed') }}"
                                    class="form-control @error('speed') is-invalid @enderror">
                                @error('speed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="life" class="form-label">Life</label>

                                <input type="text" id="life" name="life" value="{{ old('life') }}"
                                    class="form-control @error('life') is-invalid @enderror">
                                @error('life')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <div class="me-3">
                                    <img id="preview-image" width="100" src="https://via.placeholder.com/300x200">
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </main>

@endsection
