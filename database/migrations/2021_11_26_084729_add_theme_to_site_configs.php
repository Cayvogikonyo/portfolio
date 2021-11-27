<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThemeToSiteConfigs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_config', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('bio');
            $table->string('theme')->default('landrick')->after('user_id');
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
            $table->dropColumn('user_id');
            $table->dropColumn('theme');
        });
    }
}
