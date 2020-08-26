<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->increments('id');
            $table->string('book_code',50)->unique();
            $table->string('title',250);
            $table->text('description');
            $table->string('author',100);
            $table->string('feature_image')->nullable();
            $table->integer('quantity')->unsigned()->default(0);
            $table->integer('avaliable')->unsigned()->default(0);
      		$table->string('rack',10)->nullable();
      		$table->string('row',10)->nullable();
			$table->string('type',100)->nullable();
            $table->integer('price')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('books');
    }
}
