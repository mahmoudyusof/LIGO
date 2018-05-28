<?php

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('email');
});


