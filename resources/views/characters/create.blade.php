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
                        <form action="{{ route('characters.store') }}" method="POST">
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
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    value="{{ old('description') }}">

                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type_id" class="form-label">Type id</label>

                                <input type="text" id="type_id" name="type_id" value="{{ old('type_id') }}"
                                    class="form-control @error('type_id') is-invalid @enderror" >
                                @error('type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="attack" class="form-label">Attack</label>

                                <input type="text" id="attack" name="attack" value="{{ old('attack') }}"
                                    class="form-control @error('attack') is-invalid @enderror" >
                                @error('attack')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="defence" class="form-label">Defence</label>

                                <input type="text" id="defence" name="defence" value="{{ old('defence') }}"
                                    class="form-control @error('defence') is-invalid @enderror" >
                                @error('defence')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="speed" class="form-label">Speed</label>

                                <input type="text" id="speed" name="speed" value="{{ old('speed') }}"
                                    class="form-control @error('speed') is-invalid @enderror" >
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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    </main>

@endsection
