<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_collaborators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id');
            $table->foreignId('collaborator_id');
            $table->timestamps();
        });

        Schema::table('collaborators', function (Blueprint $table) {
            $table->dropColumn('work_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_collaborators');

        Schema::table('collaborators', function (Blueprint $table) {
            $table->foreignId('work_id')->after('user_id')->nullable();
        });
    }
}
