@extends('layouts.app')

@section('page-title', 'Modifica '.$album->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Modifica {{ $album->name }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.albums.update', ['album' => $album->id]) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}" required maxlength="64" placeholder="Inserisci il nome dell'album...">
                        </div>

                        <div class="mb-3">
                            <label for="artist_id" class="form-label">Artista <span class="text-danger">*</span></label>
                            <select class="form-select" id="artist_id" name="artist_id" required>
                                <option disabled>Seleziona un artista...</option>
                                @foreach ($artists as $artist)
                                    <option
                                        @if ($artist->id == $album->artist_id)
                                            selected
                                        @endif
                                        value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-warning w-100">
                                Aggiorna
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
