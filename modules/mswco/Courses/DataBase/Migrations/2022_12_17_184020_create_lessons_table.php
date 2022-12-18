<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('season_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->tinyInteger('time')->unsigned()->nullable();
            $table->integer('periority')->unsigned()->nullable();
            $table->boolean('free')->default(false);
            $table->enum('confirmation_status',['accepted','rejected','pending'])->default('pending');
            $table->enum('lock',['unlock','lock'])->default('unlock');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
};
