<?php

$tasks = $qb->selectAll('todos');

$users = $qb->selectAll('users');


require 'views/index.view.php';
