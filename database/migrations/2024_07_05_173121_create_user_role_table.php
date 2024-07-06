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
        Schema::create('user_role', function (Blueprint $table) {
            $table->uuid('userId');
            $table->uuid('roleId');
            $table->boolean('flag')->default(true);

            $table->primary(['userId', 'roleId']);
            $table->foreign('userId')->references('userId')->on('users');
            $table->foreign('roleId')->references('roleId')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
