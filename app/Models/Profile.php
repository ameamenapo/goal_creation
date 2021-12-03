<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'nickname',
        'profile_img',
        'age',
        'hobby',
        'a_word',
        'created_at',
        'updated_at',
        'user_id',
        
    ];
    
    protected $guarded = [
        'id',
       
    ];
    
    public static $rules = [
        'nickname' => 'max: 30',
        'hobby' => 'max: 50',
        'a_word' => 'max: 100',
        'profile_img' => 'image|file',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
