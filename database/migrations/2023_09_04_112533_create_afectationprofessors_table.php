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
        Schema::create('afectationprofessors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id')->constrained("professors")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("course_id")->constrained("courses")->onUpdate("cascade")->onDelete("cascade");
            $table->unique(["professor_id", "course_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afectationprofessors');
    }
};
