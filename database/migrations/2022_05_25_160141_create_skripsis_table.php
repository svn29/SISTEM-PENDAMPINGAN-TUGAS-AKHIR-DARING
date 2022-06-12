<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkripsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('judul_id');
            $table->foreign('judul_id')->references('id')->on('juduls')->onDelete('cascade')->onUpdate('cascade');
            $table->text('file')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['proses', 'dikonfirmasi', 'butuh revisi']);
            $table->text('komentar')->nullable();
            $table->unsignedBigInteger('pembimbing1_id');
            $table->foreign('pembimbing1_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('pembimbing2_id');
            $table->foreign('pembimbing2_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('skripsis');
    }
}
