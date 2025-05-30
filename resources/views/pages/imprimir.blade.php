<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura - Orden #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .details {
            margin-bottom: 20px;
        }

        .details h3 {
            margin: 5px 0;
        }

        .products {
            margin-top: 20px;
        }

        .products table {
            width: 100%;
            border-collapse: collapse;
        }

        .products th, .products td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .products th {
            background-color: #f4f4f4;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Encabezado --}}
        <div class="header">
            <h2>Orden #{{ $order->id }}</h2>
        </div>

        {{-- Detalles de la orden --}}
        <div class="details">
            <h3>Usuario: {{ $order->users()->first()->name }}</h3>
            <h3>Estatus: {{ $order->estatus }}</h3>
            <h3>Total: ${{ number_format($order->total, 2) }}</h3>
            <h3>Impuestos: ${{ number_format($order->impuestos, 2) }}</h3>
        </div>

        {{-- Lista de productos --}}
        <div class="products">
            <h3>Productos:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity ?? 1 }}</td>
                            <td>${{ number_format($product->pivot->price ?? 0, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Comentarios --}}
        <div class="footer">
            <h3>Comentarios:</h3>
            <p>{{ $order->comentarios }}</p>
        </div>
    </div>
</body>
</html>
