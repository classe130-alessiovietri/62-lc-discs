@extends('layouts.app')

@section('page-title', 'Generi')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Generi
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
                                <th scope="col"># album collegati</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                                <tr>
                                    <th scope="row">{{ $genre->id }}</th>
                                    <td>{{ $genre->name }}</td>
                                    <td>
                                        {{-- {{ $genre->albums()->count() }} --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.genres.show', ['genre' => $genre->id]) }}" class="btn btn-sm btn-primary">
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
