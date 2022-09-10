<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('slug', 100)->default("");
            $table->integer('price');
            $table->string('thumbnail', 100);
            $table->text('slides');
            $table->text('description');
            $table->integer('purchased')->default(0);
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
        Schema::dropIfExists('games');
    }
}
