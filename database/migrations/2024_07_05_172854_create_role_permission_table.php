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
        Schema::create('role_permission', function (Blueprint $table) {
            $table->uuid('permissionId');
            $table->uuid('roleId');
            $table->boolean('flag')->default(true);

            $table->primary(['permissionId', 'roleId']);
            $table->foreign('permissionId')->references('permissionId')->on('permissions');
            $table->foreign('roleId')->references('roleId')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
