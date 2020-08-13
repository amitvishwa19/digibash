<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Coupons', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('discount')->default(0);
            $table->enum('type', ['sale','promo','shipping','misc'])->default('sale');
            $table->timestamp('start_date')->default(Carbon::now());
            $table->timestamp('end_date')->default(Carbon::now());
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('Coupons');
    }
}
