@extends('layouts.app')

@section('page-title', $album->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $album->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul class="mb-0">
                        <li>
                            ID: {{ $album->id }}
                        </li>
                        <li>
                            Nome: {{ $album->name }}
                        </li>
                        <li>
                            Slug: {{ $album->slug }}
                        </li>
                        <li>
                            Artista:
                            <a href="{{ route('admin.artists.show', ['artist' => $album->artist->id]) }}">
                                {{ $album->artist->name }}
                            </a>
                        </li>
                        <li>
                            Generi:
                            <ul>
                                @foreach ($album->genres as $genre)
                                    <li>
                                        <a href="{{ route('admin.genres.show', ['genre' => $genre->id]) }}" class="badge rounded-pill text-bg-primary">
                                            {{ $genre->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            Creato il: {{ $album->created_at->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
