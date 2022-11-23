@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('films.store') }}" method="POST">
            @csrf
            <input class="form-control mt-2" type="text" name="name_it" placeholder="Nome in italiano">
            <input class="form-control mt-2" type="text" name="name_eng" placeholder="Nome originale">
            <input class="form-control mt-2" type="date" name="name_it" placeholder="Data di rilascio">
            @foreach($films as $film)
                <select class="form-control mt-2" name="{{$film->actor->name}}" id="">

                    <option value="{{$films->actor->name}}"></option>

                </select>
            @endforeach
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection

