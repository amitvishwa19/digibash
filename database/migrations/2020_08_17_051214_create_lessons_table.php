<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatelessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {

            $table->increments('id');
            $table->text('title');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('author')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('free')->default(0);
            $table->float('price')->default(0)->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('lessons');
    }
}
