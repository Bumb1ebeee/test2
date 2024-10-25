<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/order">Заказы</a>
<table>
    <tr>
        <th>номер заказа</th>
        <th>номер столика</th>
        <th>название блюда</th>
        <th>статус</th>
        <th>время создания</th>
    </tr>

    @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->table}}</td>
            <td>{{$order->dish->name}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
