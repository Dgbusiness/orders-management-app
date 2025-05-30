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
    <title>Editar Orden</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            {{-- Título --}}
            <div class="col-12 text-center">
                <h1>Editar orden {{ $data['order']->id }}</h1>
            </div>
        </div>

        <div class="col-md-12 justify-content-center align-items-center">
            {{-- Formulario --}}
            <form method="post" action="/orders/{{ $data['order']->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                {{-- Primera fila: Total e Impuestos --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="total">Total</label>
                        <input type="number" step="0.01" name="total" class="form-control"
                            value="{{ $data['order']->total }}">
                    </div>
                    <div class="col-md-6">
                        <label for="impuestos">Impuestos</label>
                        <input type="number" step="0.01" name="impuestos" class="form-control"
                            value="{{ $data['order']->impuestos }}">
                    </div>
                </div>

                {{-- Segunda fila: Estatus y Comentarios --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estatus">Estatus</label>
                        <input type="text" name="estatus" class="form-control" value="{{ $data['order']->estatus }}">
                    </div>
                    <div class="col-md-6">
                        <label for="comentarios">Comentarios</label>
                        <input type="text" name="comentarios" class="form-control"
                            value="{{ $data['order']->comentarios }}">
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
                                    name="proudcts_array[]" value="{{ $product->id }}"
                                    @if ($data['order']->products->contains($product->id)) checked @endif>
                                <label class="form-check-label"
                                    for="product-{{ $product->id }}">{{ $product->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Campo oculto para el ID del usuario --}}
                <input type="hidden" name="id" value="{{ $data['order']->users()->first()->id }}">

                {{-- Botón de envío --}}
                <div class="row justify-content-center mt-4">
                    <a class="btn btn-dark mx-1" href="/{{ $data['order']->users()->first()->id }}/show" role="button">VOLVER</a>
                    <button class="btn btn-info" style="color: white" type="submit">EDITAR</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
