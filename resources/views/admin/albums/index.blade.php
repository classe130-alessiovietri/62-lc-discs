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
            <a href="{{ route('admin.albums.create') }}" class="btn btn-success w-100">
                + Aggiungi
            </a>
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
                                <th scope="col">Generi</th>
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
                                        @foreach ($album->genres as $genre)
                                            <a href="{{ route('admin.genres.show', ['genre' => $genre->id]) }}" class="badge rounded-pill text-bg-primary">
                                                {{ $genre->name }}
                                            </a>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.albums.show', ['album' => $album->id]) }}" class="btn btn-sm btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.albums.edit', ['album' => $album->id]) }}" class="btn btn-sm btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.albums.destroy', ['album' => $album->id]) }}" method="POST" onsubmit="return confirm('Sei sicur* di voler eliminare questo album?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Elimina
                                            </button>
                                        </form>
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
