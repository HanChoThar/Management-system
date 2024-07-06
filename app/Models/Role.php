<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'roles';
    protected $primaryKey = 'roleId';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'name', 'label', 'flag'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'roleId', 'permissionId');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role', 'roleId', 'userId');
    }
}
