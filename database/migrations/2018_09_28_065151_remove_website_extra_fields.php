<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveWebsiteExtraFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websites', function (Blueprint $table) {
            $table->boolean('status')->default(1);
            $table->dropColumn('sitename');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
            $table->dropColumn('analytic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websites', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
