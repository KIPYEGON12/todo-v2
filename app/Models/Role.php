<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'permission_id', // Add this line
        'permissions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
        // return $this->belongsToMany(Permission::class , 'permission_id');

    }

    public function person()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
