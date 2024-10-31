@extends('layouts.app')

@section('page-title', 'Album')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Album
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Artista</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                                <tr>
                                    <th scope="row">{{ $album->id }}</th>
                                    <td>{{ $album->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.artists.show', ['artist' => $album->artist->id]) }}">
                                            {{ $album->artist->name }}
                                        </a>
                                        {{-- <a href="{{ route('admin.artists.show', ['artist' => $album->artist_id]) }}">
                                            {{ $album->artist->name }}
                                        </a> --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.albums.show', ['album' => $album->id]) }}" class="btn btn-sm btn-primary">
                                            Vedi
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
