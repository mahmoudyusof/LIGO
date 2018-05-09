<?php

$tasks = $qb->selectAll('todos');

require 'views/index.view.php';
