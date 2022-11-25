@extends('layouts.app') @include('alerts') @include('errors')
@section('content')
    <div class="container">
        <form action="{{ route('films.store') }}" method="POST">
            @csrf
            <p></p>
            <label class=" mt-2" for="name_it">Nome in Italiano</label>
            <input class="form-control mt-2" type="text" name="name_it" placeholder="Nome in italiano">
            <label class="mt-2" for="name_eng">Nome Originale</label>
            <input class="form-control mt-2" type="text" name="name_eng" placeholder="Nome originale">
            <label class=" mt-2" for="release_date">Data di rilascio</label>
            <input class="form-control mt-2" type="date" name="release_date" placeholder="Data di rilascio">
            <label class="mt-2" for="actor[]">Seleziona gli attori presenti (max 5)</label>
            <select class="form-control mt-2" multiple="multiple" name="actor[]" id="">
                @foreach($actors as $actor)
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                @endforeach
            </select>
            <label class="mt-2" for="genre[]">Seleziona i generi del film (max 3)</label>
            <select class="form-control mt-2" multiple="multiple" name="genre[]" id="">
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <label class="mt-2" for="tag[]">Seleziona i tag (max 10)</label>
            <select class="form-control mt-2" multiple="multiple" name="tag[]" id="">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <label class=" mt-2" for="trailer">Inserisci il link del trailer</label>
            <input class="form-control mt-2" type="text" name="trailer" placeholder="Trailer link">
            <button type="submit" class="btn btn-primary align-items-center mt-3">Submit</button>
        </form>
    </div>
@endsection

