<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'departments';
    protected $primaryKey = 'depId';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'name', 'label', 'flag'
    ];
    
    public function staff()
    {
        return $this->hasMany(User::class, 'depId', 'depId');
    }
}
