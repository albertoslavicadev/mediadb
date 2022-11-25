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
            <th class="mx-1">Generi</th>
            <th>Tags</th>
            <th>Trailer</th>
            <th>Voto</th>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $film->name_it }}</td>
                    <td>{{ $film->name_eng }}</td>
                    <td>{{ $film->release_date }}</td>

                    <td>
                        <ul>
                            @foreach($film->actors as $actor)
                                <li class="list-unstyled my-0" s>{{ $actor->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($film->genres as $genre)
                                <li class="list-unstyled my-0" s>{{ $genre->name }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        <ul>
                            @foreach($film->tags as $tag)
                                <li class="list-unstyled my-0" s>{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="">{{ $film->trailer }}</td>
                    @can('upload collection')
                        <td class="">
                            <form data-inline="true" action="{{ route('films.edit', $film) }}"
                                  method="POST"> @csrf @method('GET')
                                <button
                                    type="submit" class="btn btn-primary float-end">Edit
                                </button>
                            </form>
                        </td>
                        <td>
                            <form data-inline="true" action="{{ route('films.destroy', $film) }}"
                                  method="POST"> @csrf @method('DELETE')
                                <button
                                    type="submit" class="btn btn-danger">Delete
                                </button>
                            </form>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection



