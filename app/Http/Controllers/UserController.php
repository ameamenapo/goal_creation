<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        
        $user = Auth::user();
        return view('user.index', compact('user'));
    }
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        var_dump($user);
        $msg = '情報を編集してください。';
        return view('user.edit', compact('user','msg'));
    }
    
     public function update(Request $request)
    {
        
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
        ];
        var_dump($param);
        $user = User::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        $msg = '情報を編集しました！';
        return view('user.edit', compact('user','msg'));
    }    
    
}
