@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Lista Film</h1>
        <table class="table actor">
            <thead>
            <th>Name</th>
            <th>Nome Originale</th>
            <th>Attori Protagonisti</th>
            <th>Generi</th>
            <th>Tags</th>
            <th>Voto</th>
            </thead>
            <tbody>
            @foreach($films as $film)
                <tr>
                    <td class="">{{ $film->name_it }}</td>
                    <td class="buttons">
                        <form class="buttons-form" action="{{ route('films.edit', $film) }}" method="POST"> @csrf @method('GET') <button
                                type="submit" class="btn btn-primary">Edit</button> </form>

                        <form class="buttons-form" action="{{ route('films.destroy', $film) }}" method="POST"> @csrf @method('DELETE') <button
                                type="submit" class="btn btn-danger">Delete</button></form>
                        </form>
                        <form class="form-horizontal poststars" action="{{route('star', $film->id)}}" id="addStar" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


<style>
    div.stars {
        display: inline-block;
    }

    input.star { display: none; }

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

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: 'f006';
        font-family: FontAwesome;
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
    $('#addStar').change('.star', function(e) {
        $(this).submit();
    });
</script>
