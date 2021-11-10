<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiteConfigIdToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('collaborators', function (Blueprint $table) {
            if(!Schema::hasColumn('collaborators', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('services', function (Blueprint $table) {
            if(!Schema::hasColumn('services', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('works', function (Blueprint $table) {
            if(!Schema::hasColumn('works', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('portofolios', function (Blueprint $table) {
            if(!Schema::hasColumn('portofolios', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('experiences', function (Blueprint $table) {
            if(!Schema::hasColumn('experiences', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('categories', function (Blueprint $table) {
            if(!Schema::hasColumn('categories', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });


        Schema::table('tickets', function (Blueprint $table) {
            if(!Schema::hasColumn('tickets', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('articles', function (Blueprint $table) {
            if(!Schema::hasColumn('articles', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('socials', function (Blueprint $table) {
            if(!Schema::hasColumn('socials', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('site_stats', function (Blueprint $table) {
            if(!Schema::hasColumn('site_stats', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });

        Schema::table('skills', function (Blueprint $table) {
            if(!Schema::hasColumn('skills', 'site_config_id')){
                $table->foreignId('site_config_id')->after('id')->nullable();
            }
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('collaborators', function (Blueprint $table) {
            if(Schema::hasColumn('collaborators', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('services', function (Blueprint $table) {
            if(Schema::hasColumn('services', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('works', function (Blueprint $table) {
            if(Schema::hasColumn('works', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('portofolios', function (Blueprint $table) {
            if(Schema::hasColumn('portofolios', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('experiences', function (Blueprint $table) {
            if(Schema::hasColumn('experiences', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('categories', function (Blueprint $table) {
            if(Schema::hasColumn('categories', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('tickets', function (Blueprint $table) {
            if(Schema::hasColumn('tickets', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('articles', function (Blueprint $table) {
            if(Schema::hasColumn('articles', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('socials', function (Blueprint $table) {
            if(Schema::hasColumn('socials', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('site_stats', function (Blueprint $table) {
            if(Schema::hasColumn('site_stats', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });

        Schema::table('skills', function (Blueprint $table) {
            if(Schema::hasColumn('skills', 'site_config_id')){
                $table->foreignId('site_config_id');
            }
        });


        
    }
}
