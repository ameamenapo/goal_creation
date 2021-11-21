<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Goal; 

class Goal_list extends Model
{
    
    
    use HasFactory;
    protected $fillable = [
            'classification', 
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
    
    public function goal()
    {
        return $this->hasMany('App\Models\Goal');
    }
    
    protected static function boot() //このアクションはログインユーザーと入力した目標が紐付けられるかもと思って入れたコード
    {
        parent::boot();

        // 保存時user_idをログインユーザーに設定
        self::saving(function($goal_list) {
            $goal_list->user_id = \Auth::id();
        });
    }
    
    
}
