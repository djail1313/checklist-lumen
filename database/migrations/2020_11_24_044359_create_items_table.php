<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checklist_id');
            $table->text('description');
            $table->dateTime('due')->nullable(true);
            $table->unsignedInteger('urgency')->default(0);
            $table->unsignedBigInteger('assignee_id')->nullable(true);
            $table->string('task_id')->nullable(true);
            $table->boolean('is_completed')->default(false);
            $table->dateTime('completed_at')->nullable(true);
            $table->unsignedBigInteger('completed_by')->nullable(true);
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('checklist_id')->references('id')->on('checklists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
