@extends('layouts.app') @include('alerts') @include('errors')

@section('content')
    <div class="container">
        <h4>Risultati per la ricerca</h4>
        <div class="container d-flex mt-3">

            @forelse($films as $film)
                <h3 class="">{{ $film->name_eng }}</h3>
                <form class="buttons-form float-end" action="{{ route('films.show', $film) }}"
                      method="POST"> @csrf @method('GET')
                    <button
                        type="submit" class="btn btn-primary float-start mx-4">Show
                    </button>
                </form>
            @empty
                <h1>NOTHING</h1>
            @endforelse
        </div>
    </div>
@endsection
