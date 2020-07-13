<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAsserLinkToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('asset')->nullable()->after('order');
            $table->string('icon_class')->nullable()->after('class');
            $table->boolean('status')->default(false)->after('icon_class');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('class');
            $table->dropColumn('icon_class');
            $table->dropColumn('status');
        });
    }
}
