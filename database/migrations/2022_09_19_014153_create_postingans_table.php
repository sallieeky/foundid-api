<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("item_id");
            $table->string("hilang_ditemukan")->nullable();
            $table->integer("user_ditemukan_id")->nullable();
            $table->integer("user_hilang_id")->nullable();
            $table->boolean("isAnonym")->nullable();
            $table->boolean("isDone")->default(false);
            $table->text("nama_anonym")->nullable();
            $table->date("tanggal");
            $table->dateTime("waktu_selesai")->nullable();
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
        Schema::dropIfExists('postingans');
    }
};
