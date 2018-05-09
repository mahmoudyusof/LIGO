<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HEXy way</title>
</head>
<body>
    <?php foreach ($tasks as $task): ?>
        <h3><?= $task->title; ?></h3>
        <p><?= $task->body; ?></p>
        <hr>
    <?php endforeach ?>
</body>
</html>