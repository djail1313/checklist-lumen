<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->text('description');
            $table->enum('due_unit', ['second', 'minute', 'hour', 'day', 'week', 'month', 'year'])->nullable(false);
            $table->unsignedInteger('due_interval')->nullable(false);
            $table->timestamps();

            $table->foreign('template_id')->references('id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_checklists');
    }
}
