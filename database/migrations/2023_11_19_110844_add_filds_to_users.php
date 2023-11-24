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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nic')->nullable();
            $table->string('course_name')->nullable();
            $table->string('university_program')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('degree_name')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nic');
            $table->dropColumn('course_name');
            $table->dropColumn('university_program');
            $table->dropColumn('degree_name');
            $table->dropColumn('faculty_name');
            //
        });
    }
};
