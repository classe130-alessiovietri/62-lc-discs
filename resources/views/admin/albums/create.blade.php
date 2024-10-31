@extends('layouts.app')

@section('page-title', 'Crea album')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Crea album
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.albums.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required maxlength="64" placeholder="Inserisci il nome dell'album...">
                        </div>

                        <div class="mb-3">
                            <label for="artist_id" class="form-label">Artista <span class="text-danger">*</span></label>
                            <select class="form-select" id="artist_id" name="artist_id" required>
                                <option selected disabled>Seleziona un artista...</option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <div>
                                <label class="form-label">Generi</label>
                            </div>
                            @foreach ($genres as $genre)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="genre-{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
                                    <label class="form-check-label" for="genre-{{ $genre->id }}">
                                        {{ $genre->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
