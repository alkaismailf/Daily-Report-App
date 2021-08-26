<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_report', function (Blueprint $table) {
            $table->increments('id_report');
            $table->unsignedBigInteger('nik');
            $table->string('task');
            $table->text('description');
            $table->timestamps();
            // $table->primary('id_report');
            $table->foreign('nik')->references('nik')->on('tb_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
