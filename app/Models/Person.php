<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Model
{
    protected $guarded = array('id');
    protected $fillable = [
        'name', 'birthday', 'email', 'password', 'password_confirmation',
    ];
    
    use HasFactory;
}
