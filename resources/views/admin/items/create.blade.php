@extends('layouts.app')

@section('content')
    <main>

        <div id="create-items">

            <div class="container">
                <div class="py-5">
                    <h2>Add a new item</h2>
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
                        <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="category" class="form-label">Category</label>

                                <input type="text" id="category" name="category" value="{{ old('category') }}"
                                    class="form-control @error('category') is-invalid @enderror">
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>

                                <input type="text" id="type" name="type" value="{{ old('type') }}"
                                    class="form-control @error('type') is-invalid @enderror">
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>

                                <input type="text" id="weight" name="weight" value="{{ old('weight') }}"
                                    class="form-control @error('weight') is-invalid @enderror">
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>

                                <input type="text" id="cost" name="cost" value="{{ old('cost') }}"
                                    class="form-control @error('cost') is-invalid @enderror">
                                @error('cost')
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
