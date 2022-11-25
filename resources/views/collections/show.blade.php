@extends('layouts.app') @section('content') @include('alerts')

<div class="container">


    <table class="table">
        <thead>
        <th>Nome</th>
        <th>Film</th>

        </thead>
        <tbody>
        <tr>

            <td>{{ $collection->name }}</td>


            @foreach($collection->films as $film)
                <td>
                    <h6 class="">{{ $film->name_eng }}</h6>
                    <form class="buttons-form" action="{{ route('films.show', $film) }}"
                          method="POST"> @csrf @method('GET')
                        <button
                            type="submit" class="btn btn-primary float-start mx-4">Show
                        </button>
                    </form>
                </td>
            @endforeach
                @can('upload collection')
                    <td class="">
                        <form data-inline="true" action="{{ route('collections.edit', $collection) }}"
                              method="POST"> @csrf @method('GET')
                            <button
                                type="submit" class="btn btn-primary float-end">Edit
                            </button>
                        </form>
                    </td>
                    <td>
                        <form data-inline="true" action="{{ route('collections.destroy', $collection) }}"
                              method="POST"> @csrf @method('DELETE')
                            <button
                                type="submit" class="btn btn-danger">Delete
                            </button>
                        </form>
                    </td>
                @endcan
            </tr>
        </tbody>
    </table>
    <div class="comments">
{{--        @foreach($collection->comments as $comment)--}}
{{--            --}}
{{--        @endforeach--}}
    </div>
</div>+
@endsection

