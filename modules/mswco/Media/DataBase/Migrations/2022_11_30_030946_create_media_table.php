<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('files');
            $table->enum('type',['image','video','audio','zip','doc']);
            $table->text('filename',255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};
