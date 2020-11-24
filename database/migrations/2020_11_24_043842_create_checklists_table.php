<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->string('object_domain')->nullable(false);
            $table->string('object_id')->nullable(false);
            $table->string('task_id')->nullable(true);
            $table->dateTime('due')->nullable(true);
            $table->unsignedInteger('urgency')->default(0);
            $table->text('description');
            $table->boolean('is_completed')->default(false);
            $table->dateTime('completed_at')->nullable(true);
            $table->unsignedBigInteger('last_update_by')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);

            $table->softDeletes();
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
        Schema::dropIfExists('checklists');
    }
}
