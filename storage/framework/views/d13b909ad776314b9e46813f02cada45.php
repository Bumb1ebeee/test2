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

    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->id); ?></td>
            <td><?php echo e($order->table); ?></td>
            <td><?php echo e($order->dish->name); ?></td>
            <td><?php echo e($order->status); ?></td>
            <td><?php echo e($order->created_at); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\localhost\test2\resources\views/archive.blade.php ENDPATH**/ ?>