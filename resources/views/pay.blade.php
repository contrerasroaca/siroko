<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopingCart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <h1>Pago Exitoso</h1>

    <table class="table" width="100%">
        <thead>
            <tr>
                <th>Total de Items</th>
                <th>Importe</th>
                <th>Metodo de Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ number_format($cartTotalItems, 2, ',', '.') }}</td>
                <td>{{ number_format($cartTotal, 2, ',', '.') }}</td>
                <td>Efectivo</td>

            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
