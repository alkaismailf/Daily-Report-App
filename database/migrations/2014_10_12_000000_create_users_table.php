<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('nik')->unique();
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->text('alamat');
            $table->string('email');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['pegawai', 'manajer']);
            $table->rememberToken();
            $table->timestamps();
            // $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
