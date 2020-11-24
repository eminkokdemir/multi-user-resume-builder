<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId("resume_id");
            $table->string("school_name")->nullable();
            $table->string("degree")->nullable();
            $table->string("field_of_study")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("grade")->nullable();
            $table->text("activities_and_societies")->nullable();
            $table->text("description")->nullable();
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
        Schema::dropIfExists('education');
    }
}
