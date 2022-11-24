@extends('layouts.app') @section('content') @include('alerts')
<table class="table car">
    <thead>
    <th>Nome</th>
    <th>Film</th>
    </thead>
    <tbody>
    <tr>
        <td>{{ $collection->name }}</td>
        @foreach($collection->films as $film)
        <td> {{ $film->name_eng }}</td>
        @endforeach
        @can('upload collection')
            <td class="">
                <form data-inline="true" action="{{ route('collections.edit', $collection) }}"
                      method="POST"> @csrf @method('GET') <button
                        type="submit" class="btn btn-primary float-end">Edit</button> </form>
            </td>
            <td>
                <form data-inline="true" action="{{ route('collections.destroy', $collection) }}"
                      method="POST"> @csrf @method('DELETE') <button
                        type="submit" class="btn btn-danger">Delete</button></form>
                </form>
            </td>
        @endcan
    </tr>
    </tbody>
</table>
@endsection
