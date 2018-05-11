<?php require('partials/header.php'); ?>
    <?php foreach ($tasks as $task): ?>
        <h3><?= htmlspecialchars($task->title); ?></h3>
        <p><?= htmlspecialchars($task->body); ?></p>
        <hr>
    <?php endforeach ?>
    <ul>
    <?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user->name); ?> @ &lt; <?= htmlspecialchars($user->email); ?> &gt;</li>
    <?php endforeach ?>
    </ul>
<?php require('partials/footer.php'); ?>