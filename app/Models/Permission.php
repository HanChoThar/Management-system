<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'permissions';
    protected $primaryKey = 'permissionId';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'name', 'label', 'flag'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permissionId', 'roleId');
    }
}
