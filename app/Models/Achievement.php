<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'theme',
        'progress',
        'created_at',
        'updated_at',
        'user_id',
        'goal_id',
        ];
    protected $guarded = [
        'id',
        
];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
     public function goals()
    {
        return $this->hasMany('App\Goal');
    }
}
