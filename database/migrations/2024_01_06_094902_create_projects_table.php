<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('system_owner');
            $table->string('system_pic');
            $table->date('start_date');
            $table->integer('duration');
            $table->date('end_date');
            $table->string('status')->default('Pending'); // You can set a default value
            $table->string('lead_developer');
            $table->text('developers');
            $table->string('methodology');
            $table->string('platform');
            $table->string('deployment_type');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
