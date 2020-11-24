<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId("resume_id");
            $table->string("name");
            $table->string("issuing_organization");
            $table->date("issue_date")->nullable();
            $table->date("expiration_date")->nullable();
            $table->boolean("is_it_expiring")->default(0);
            $table->string("credential_id")->nullable();
            $table->string("credential_url")->nullable();
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
        Schema::dropIfExists('certifications');
    }
}
