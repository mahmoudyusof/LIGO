<?php

$qb = require "bootstrap.php";

$tasks = $qb->selectAll('todos');


require 'index.view.php';
