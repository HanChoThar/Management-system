<?php

namespace App\Models;

use App\Helpers\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'staff';
    protected $primaryKey = 'staffId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'name',
        'email',
        'mobile',
        'joinedDate',
        'depId',
        'position',
        'age',
        'gender',
        'status',
        'updatedBy'
    ];

    public function uuidColumn(): string
    {
        return 'depId';
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'depId', 'depId');
    }
}
