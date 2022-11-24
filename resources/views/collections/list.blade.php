@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Collezioni</h1>
        <table class="table actor">
            <thead>
            <th>Collezione</th>
            <th>Films</th>
            <th>Voto</th>
            </thead>
            <tbody>
            @foreach($collections as $collection)
                <td>
                    {{$collection->name}}
                </td>
                <td>
                    @foreach($collection->films as $film)
                        {{ $film->name_eng }}
                    @endforeach
                </td>
                <td>
                <form class="buttons-form" action="{{ route('collections.edit', $collection) }}" method="POST"> @csrf @method('GET') <button
                        type="submit" class="btn btn-primary">Edit</button> </form>
                <form class="buttons-form" action="{{ route('collections.show', $collection) }}" method="POST"> @csrf @method('GET') <button
                        type="submit" class="btn btn-primary">Show</button> </form>
                <form class="buttons-form" action="{{ route('collections.destroy', $collection) }}" method="POST"> @csrf @method('DELETE') <button
                        type="submit" class="btn btn-danger">Delete</button> </form>
                </td>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


<style>
    div.stars {
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 20px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: 'f005';
        color: #e74c3c;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: #e74c3c;
        text-shadow: 0 0 5px #7f8c8d;
    }

    input.star-1:checked ~ label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: 'f006';
        font-family: FontAwesome;
        font-weight: 900;
    }


    .horline > li:not(:last-child):after {
        content: " |";
    }

    .horline > li {
        font-weight: bold;
        color: #ff7e1a;

    }
</style>

<script>
    $('#addStar').change('.star', function (e) {
        $(this).submit();
    });
</script>
