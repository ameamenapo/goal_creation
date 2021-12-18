<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = [
            'name', 
            'email',
            'contents',
            'created_at', 
            'updated_at',
            ];
    
    protected $guarded = [
        'id',
    ];
    
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'contents' => 'required',
        
    ];
}
