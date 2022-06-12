<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juduls', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('status', ['proses', 'dikonfirmasi', 'butuh revisi'])->nullable();
            $table->unsignedBigInteger('pengaju_id');
            $table->foreign('pengaju_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ppa_id');
            $table->foreign('ppa_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juduls');
    }
}
