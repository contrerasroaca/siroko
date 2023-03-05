<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    @if (count($products) > 0)
        <div class="container-fluid">
            <h3 class="text-info text-bold col">Total Items en Carrito <span
                    class="totalitems">{{ $totalCartItems }}</span> por un monto de
                <span class="totalpay">{{ $totalPriceCartItems }}</span>

            </h3>
            <a href="{{ route('cart.checkout') }}" class="btn btn-outline-primary">Ver Carrito</a>
        </div>
        <table class="table" width="100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>CantAñadir</th>
                    <th>CantDelete</th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tr>
                    <th>{{ $product->name }}</th>
                    <td>${{ $product->price }}</td>
                    <td>
                        <form method="post" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            <input type="number" id="quantity" name="quantity" value="1" min="1">
                            <button type="submit">+ cart</button>
                        </form>

                    </td>
                    <td>
                        <form method="post" action="{{ route('cart.updabyproduct') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $product->id}}">
                            <input type="number" id="quantity" name="quantity" value="1" min="1">
                            <button type="submit" class="">- cart</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No products found.</p>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
