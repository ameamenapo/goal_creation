<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Goal_list; 

class Goal extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme',
        'first_day',
        'second_day',
        'third_day',
        'fourth_day',
        'fifth_day',
        'sixth_day',
        'seventh_day',
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
    
    public function goal_lists()
    {
        return $this->hasMany('App\Models\Goal_list');
    }
    
    public function achievements()
    {
        return $this->hasMany('App\Models\Achievement');
    }
    
    protected static function boot()
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($goal) {
            $goal->user_id = \Auth::id();
        });
    }
}

            