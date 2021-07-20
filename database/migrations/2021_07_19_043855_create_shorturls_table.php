<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShorturlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shorturls', function (Blueprint $table) {
            $table->id();
            $table->char('bigUrl',255);
            $table->char('smallUrl',100);
            $table->integer('addCount');
            $table->boolean('nsfw');
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
        Schema::dropIfExists('shorturls');
    }
}
