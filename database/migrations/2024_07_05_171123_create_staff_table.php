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
        Schema::create('staff', function (Blueprint $table) {
            $table->uuid('staffId')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->date('joinedDate');
            $table->uuid('depId')->index();
            $table->string('position');
            $table->integer('age');
            $table->string('gender');
            $table->string('status');
            $table->timestamps();
            $table->string('updatedBy');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
