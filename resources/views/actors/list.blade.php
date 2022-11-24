@extends('layouts.app') @include('alerts') @include('errors')


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
                <tr class="">
                    <td class="">{{ $actor->name }}</td>
                    @can('upload collection')
                    <td class="">
                    <form data-inline="true" action="{{ route('actors.edit', $actor) }}"
                                method="POST"> @csrf @method('GET') <button
                                type="submit" class="btn btn-primary float-end">Edit</button> </form>
                    </td>
                    <td>
                        <form data-inline="true" action="{{ route('actors.destroy', $actor) }}"
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
