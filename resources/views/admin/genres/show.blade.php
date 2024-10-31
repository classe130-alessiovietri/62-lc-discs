@extends('layouts.app')

@section('page-title', $genre->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $genre->name }}
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
                            ID: {{ $genre->id }}
                        </li>
                        <li>
                            Nome: {{ $genre->name }}
                        </li>
                        <li>
                            Creato il: {{ $genre->created_at->format('d/m/Y') }}
                        </li>
                        <li>
                            Album collegati:

                            <ul>
                                @foreach ($genre->albums as $album)
                                    <li>
                                        <a href="{{ route('admin.albums.show', ['album' => $album->id]) }}">
                                            {{ $album->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
