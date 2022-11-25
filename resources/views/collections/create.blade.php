@extends('layouts.app') @include('alerts') @include('errors')
@section('content')
    <div class="container">
        <form action="{{ route('collections.store') }}" method="POST">
            @csrf
            <input class="form-control mt-2" type="text" name="name" placeholder="Nome in italiano">
            <label for=""></label>
            <select class="form-control mt-2" multiple="multiple" name="film[]" id="">
                @foreach($films as $film)
                    <option value="{{$film->id}}">{{$film->name_eng}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary align-items-center mt-3">Publica la tua collezione</button>
        </form>
    </div>
@endsection


