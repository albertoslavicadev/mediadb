@extends('layouts.app') @section('content') @include('alerts')

<div class="container">


    <table class="table car">
        <thead>
        <th>Nome</th>
        <th>Film</th>
        <th>Vote</th>
        </thead>
        <tbody>
        <tr>
            <td>{{ $collection->name }}</td>

            <td>
                <ul>
                    @foreach($collection->films as $film)
                        <li> {{ $film->name_eng }}</li>
                    @endforeach
                </ul>
            </td>

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
                    </form>
                </td>
            @endcan

        </tr>
        </tbody>
    </table>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if ($("#star-rating").length) {
            $(".star", "#star-rating").click(function () {
                $(this).addClass("checked").siblings().removeClass("checked");
            });
            $("#create-review").click(function () {
                var $btn = $(this);
                $btn.next().css("opacity", 0);
                var data = {
                    product: $btn.data("collection"),
                    vote: $("#star-rating .checked").data("vote")
                };
                $.post("/ajax/review", data, function (res) {
                    if (res.saved) {
                        $btn.next().css("opacity", 1);
                    }
                });
            });
        }
    });
</script>

