<?php

namespace App\Migrations;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateUsersMigration
{
    public static function up()
    {
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });
    }
    public static function down()
    {
        Capsule::schema()->dropIfExists('users');
    }
}