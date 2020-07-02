<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableSurveyapi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_api', function (Blueprint $table) {
            $table->string('survey_code');
            $table->unique('survey_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_api', function (Blueprint $table) {
            $table->dropColumn('survey_code');
            
        });
    }
}
