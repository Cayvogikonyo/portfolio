<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteHeaderToSiteConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_config', function (Blueprint $table) {
            $table->string('site_header')->after('name')->default('bg-site-bg');
            $table->string('layout')->after('name')->default('layout1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_config', function (Blueprint $table) {
            $table->dropColumn('site_header');
            $table->dropColumn('layout');
        });
    }
}
