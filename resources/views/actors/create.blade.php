@extends('layouts.app') @include('alerts') @include('errors')
@section('content')
    <div class="container">
        <form action="{{ route('actors.store') }}" method="POST">
            @csrf
            <input class="form-control mt-2" type="text" name="name" placeholder="Nome in italiano">


            <button type="submit" class="btn btn-primary align-items-center mt-3">Submit</button>
        </form>

    </div>
@endsection



