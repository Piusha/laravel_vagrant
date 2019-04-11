<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserOnboardingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_onboardings', function (Blueprint $table) {
            $table->integer('user_id');
            $table->date('created_at');
            $table->integer('onboarding_perentage');
            $table->integer('count_applications');
            $table->integer('count_accepted_application');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_onboardings');
    }
}
