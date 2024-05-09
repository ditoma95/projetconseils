<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mentors_problemes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('mentor_id');
            $table->unsignedInteger('problem_id');
            $table->foreign('problem_id')->references('id')->on('problemes')->onDelete('cascade');
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors_problemes');
    }
};
