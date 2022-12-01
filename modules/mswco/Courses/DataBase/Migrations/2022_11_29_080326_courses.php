<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
$table->bigInteger('teacher_id')->unsigned();
$table->bigInteger('category_id')->unsigned()->nullable();
$table->string('title');
$table->string('slug');
$table->string('priority')->nullable();
$table->string('price',10);
$table->string('percent',5);
$table->enum('type',['free','cash']);
$table->enum('status',['completed','not-completed','lock']);
$table->text('body')->nullable();
$table->string('attachment')->nullable();
            $table->timestamps();
 $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
 $table->foreign('teacher_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
