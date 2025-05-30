<!DOCTYPE html>
<html lang="en">
<style>
    .row {
        border-radius: 2vh;
        background-color: rgba(205, 223, 254, 0.4);
        padding-top: 1vh;
        padding-bottom: 1vh;
    }

    a {
        color: black;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <title>Document</title>
</head>

<body>

    {{-- Se listan los usuarios. --}}
    <div class="container mt-5">
        <h1>Lista de usuarios</h1>
        <div class="row col-md-12">
            @foreach ($users as $user)
                <div class="col-3" style="margin-bottom: 1vh;">
                    <h3><a class="btn btn-info" href="/{{ $user->id }}/show">{{ $user->name }}</a></h3>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
