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
        Schema::create('sessionsmentors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
            $table->longText("contenu");
            $table->string("titre");
            $table->array("images");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessionsmentors');
    }
};
