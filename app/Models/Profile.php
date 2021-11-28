<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'nickname',
        'age',
        'hobby',
        'a_word',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [
        'id',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
