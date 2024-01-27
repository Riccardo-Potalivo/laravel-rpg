@extends('layouts.app')


@section('content')
    <main>
        <div class="container">
            <div class="d-flex justify-content-between  align-items-center ">
                <h1 class="py-4">
                    Games
                </h1>
            </div>
            <table class="table p-3">
                <thead>
                    <tr>
                        <th scope="col">Time</th>
                        <th scope="col">Computer wins</th>
                        <th scope="col">Player wins</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td>{{ $game->created_at->diffForHumans() }}</td>
                            <td>{{ $game->computerCountWin }}</td>
                            <td>{{ $game->playerCountWin }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </main>
@endsection
