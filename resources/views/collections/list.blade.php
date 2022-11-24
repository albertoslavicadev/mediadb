@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Collezioni</h1>
        <table class="table actor">
            <thead>
            <th>Collezione</th>
            <th></th>
            <th>Attori Protagonisti</th>
            <th>Generi</th>
            <th>Tags</th>
            <th>Voto</th>
            </thead>
            <tbody>

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
    $('#addStar').change('.star', function(e) {
        $(this).submit();
    });
</script>