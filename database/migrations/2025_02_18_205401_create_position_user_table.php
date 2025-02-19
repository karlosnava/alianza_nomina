<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionUserTable extends Migration
{
    public function up()
    {
        Schema::create('position_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->unique(['position_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('position_user');
    }
}
