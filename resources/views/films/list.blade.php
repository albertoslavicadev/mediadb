@extends('layouts.app') @include('alerts') @include('errors')


@section('content')
    <div class="container">
        <h1 class="text-center">Lista Film</h1>
        <table class="table actor">
            <thead>
            <th>Name</th>
            <th>Nome Originale</th>
            <th>Data d'uscita</th>
            <th>Attori</th>
            <th>Generi</th>
            <th>Tags</th>
            <th>Voto</th>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td class="">{{ $film->name_it }}</td>
                    <td class="">{{ $film->name_eng }}</td>
                    <td class="">{{ $film->release_date }}</td>
                    @foreach($film->actors as $actor)
                    <td class="">{{ $actor->name }}</td>
                    @endforeach
                    @foreach($film->genres as $genre)
                        <td class="">{{ $genre->name }}</td>
                    @endforeach
                    @foreach($film->tags as $tag)
                        <td class="">{{ $tag->name }}sss</td>
                    @endforeach

                    <td class="">{{ $film->trailer }}</td>
                    @can('upload collection')
                        <td class="">
                            <form data-inline="true" action="{{ route('films.edit', $film) }}"
                                  method="POST"> @csrf @method('GET') <button
                                    type="submit" class="btn btn-primary float-end">Edit</button> </form>
                        </td>
                        <td>
                            <form data-inline="true" action="{{ route('films.destroy', $film) }}"
                                  method="POST"> @csrf @method('DELETE') <button
                                    type="submit" class="btn btn-danger">Delete</button></form>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



