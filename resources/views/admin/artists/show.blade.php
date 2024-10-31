@extends('layouts.app')

@section('page-title', $artist->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $artist->name }}
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
                            ID: {{ $artist->id }}
                        </li>
                        <li>
                            Nome: {{ $artist->nome }}
                        </li>
                        <li>
                            Creato il: {{ $artist->created_at->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
