<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesAndPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert roles
        DB::table('roles')->insert([
            ['roleId' => Str::uuid(),'name' => 'Standard User','label' => 'Standard label','created_at' => now(), 'updated_at' => now()],
            ['roleId' => Str::uuid(),'name' => 'Manager','label' => 'manager label', 'created_at' => now(), 'updated_at' => now()],
            ['roleId' => Str::uuid(),'name' => 'Super Admin','label' => 'super label', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert permissions
        DB::table('permissions')->insert([
            ['permissionId' => Str::uuid(),'name' => 'view_self_info','label' => 'first label', 'created_at' => now(), 'updated_at' => now()],
            ['permissionId' => Str::uuid(),'name' => 'view_department_info','label' => 'Second label', 'created_at' => now(), 'updated_at' => now()],
            ['permissionId' => Str::uuid(),'name' => 'view_all_info','label' => 'Third label', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Assign permissions to roles
        $rolePermissions = [
            'Standard User' => ['view_self_info'],
            'Manager' => ['view_self_info', 'view_department_info'],
            'Super Admin' => ['view_self_info', 'view_department_info', 'view_all_info'],
        ];

        foreach ($rolePermissions as $role => $permissions) {
            $roleId = DB::table('roles')->where('name', $role)->value('roleId');
            foreach ($permissions as $permission) {
                $permissionId = DB::table('permissions')->where('name', $permission)->value('permissionId');
                DB::table('role_permission')->insert([
                    'roleId' => $roleId,
                    'permissionId' => $permissionId,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('role_permission')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
    }
}
