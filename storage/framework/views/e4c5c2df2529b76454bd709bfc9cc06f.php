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
    <?php echo csrf_field(); ?>
    <label for="name">Название блюда</label>
    <input type="text" name="name">
    <button>Создать</button>
</form>
<p>Создание заказа</p>
<form action="/NewOrder" method="post">
    <?php echo csrf_field(); ?>
    <select name="dish">
            <option disabled>Выберите блюдо</option>
            <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dish->id); ?>"><?php echo e($dish->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->id); ?></td>
            <td><?php echo e($order->table); ?></td>
            <td><?php echo e($order->dish->name); ?></td>
            <td><?php echo e($order->status); ?></td>
            <td><?php echo e($order->created_at); ?></td>
            <td>
                <form action="/update" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="id" hidden value="<?php echo e($order->id); ?>">
                    <button>Обновить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\localhost\test2\resources\views/order.blade.php ENDPATH**/ ?>