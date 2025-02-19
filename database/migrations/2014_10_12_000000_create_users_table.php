<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 20);
            $table->string('middle_name', 20)->nullable();
            $table->string('first_surname', 20);
            $table->string('second_surname', 20)->nullable();
            $table->foreignId('document_type_id')->constrained();
            $table->string('document', 15)->unique();
            $table->string('address');
            $table->string('phone')->unique();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('boss_id')->nullable();
            $table->foreignId('role_id')->default(1)->constrained(); // 1 = Employeer || 2 = Payroll || 3 - President
            $table->timestamps();

            $table->foreign('boss_id')->references('id')->on('users')->onUpdate('restrict')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
