<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId("resume_id");
            $table->string("organization");
            $table->string("role");
            $table->string("cause");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->boolean("is_working");
            $table->text("description");
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
        Schema::dropIfExists('volunteer_experiences');
    }
}
