<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticable
{
    use SoftDeletes;
    use HasFactory;
    protected $table= 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'status',
       
    ];

    public function user()
    {
        return $this->hasMany(official_report::class);
        
    }
}