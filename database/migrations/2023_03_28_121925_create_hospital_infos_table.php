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
        Schema::create('hospital_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('hospital_name');
            $table->longText('location');
            $table->string('reg_number');
            $table->string('phone');
            $table->foreignuuid('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_infos');
    }
};
