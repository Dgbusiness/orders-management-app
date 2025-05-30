<!DOCTYPE html>
<html lang="en">
<style>
    .col-md-12 {
        border-radius: 2vh;
        background-color: rgba(205, 223, 254, 0.4);
        padding-top: 1vh;
        padding-bottom: 1vh;
    }

    .col-md-8,
    .row {
        padding-top: 1vh;
        padding-bottom: 1vh;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Crear Orden</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            {{-- Título --}}
            <div class="col-12 text-center">
                <h1>Nueva orden para {{ $data['user']->name }}</h1>
            </div>
        </div>

        <div class="col-md-12 justify-content-center align-items-center">
            {{-- Formulario --}}
            <form method="post" action="/orders">
                {{ csrf_field() }}

                {{-- Primera fila: Total e Impuestos --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="total">Total</label>
                        <input type="number" step="0.01" name="total" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="impuestos">Impuestos</label>
                        <input type="number" step="0.01" name="impuestos" class="form-control">
                    </div>
                </div>

                {{-- Segunda fila: Estatus y Comentarios --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estatus">Estatus</label>
                        <input type="text" name="estatus" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="comentarios">Comentarios</label>
                        <input type="text" name="comentarios" class="form-control">
                    </div>
                </div>

                {{-- Tercera fila: Título de Productos --}}
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <h2>Productos</h2>
                    </div>
                </div>

                <hr style="width: 100%; height: 1px; background-color: #0000002a;">
                {{-- Cuarta fila: Grid de Productos --}}
                <div class="row">
                    @foreach ($data['products'] as $product)
                        <div class="col-md-3 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="product-{{ $product->id }}"
                                    name="proudcts_array[]" value="{{ $product->id }}">
                                <label class="form-check-label"
                                    for="product-{{ $product->id }}">{{ $product->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Campo oculto para el ID del usuario --}}
                <input type="hidden" name="id" value="{{ $data['user']->id }}">

                {{-- Botón de envío --}}
                <div class="row justify-content-center mt-4">
                        <button class="btn btn-info" style="color: white" type="submit">CREAR</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>
