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
<p>Создание блюда</p>
<form action="/NewDish" method="post">
    @csrf
    <label for="name">Название блюда</label>
    <input type="text" name="name">
    <button>Создать</button>
</form>
<p>Создание заказа</p>
<form action="/NewOrder" method="post">
    @csrf
    <select name="dish">
            <option disabled>Выберите блюдо</option>
            @foreach($dishes as $dish)
                <option value="{{$dish->id}}">{{$dish->name}}</option>
            @endforeach
    </select>
    <label for="table">Столик</label>
    <input type="number" min="1" name="table">
    <button>оформить</button>
</form>
<form action="/archive">
    <button>Архив</button>
</form>
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
            <td>
                <form action="/update" method="post">
                    @csrf
                    <input type="text" name="id" hidden value="{{$order->id}}">
                    <button>Обновить</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
