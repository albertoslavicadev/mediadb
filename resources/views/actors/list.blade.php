@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Lista Attori</h1>
    <table class="table actor">
        <thead>
        <th>Name</th>

        <th></th>

        </thead>
        <tbody>
        @foreach ($actors as $actor)
            <tr>
                <td class="">{{ $actor->name }}</td>
                <td class="buttons">
                    <form class="buttons-form" action="{{ route('actors.edit', $actor) }}" method="POST"> @csrf @method('GET') <button
                            type="submit" class="btn btn-primary">Edit</button> </form>

                <form class="buttons-form" action="{{ route('actors.destroy', $actor) }}" method="POST"> @csrf @method('DELETE') <button
                        type="submit" class="btn btn-danger">Delete</button></form>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
