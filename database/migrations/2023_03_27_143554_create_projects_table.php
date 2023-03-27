<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('name', 50);
            $table->string('description', 150)->nullable();
            $table->text('summary')->nullable();
            $table->string('icon', 255);
            $table->boolean('is_favorites')->default(false);
            $table->unsignedBigInteger('owner');
            $table->string('status', 10);
            $table->string('priority', 10);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('owner')->references('id')->on('users');
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
};
