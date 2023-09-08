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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained("studentslist")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("course_id")->constrained("courses")->onUpdate("cascade")->onDelete("cascade");
            $table->enum("type", ["Devoir", "Partiel"]);
            $table->integer("note");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
