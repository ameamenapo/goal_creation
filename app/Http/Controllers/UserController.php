<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //下のconstrunt()は、ログインユーザーでないと各viewにgetアクセスできないように設定している。
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function getLogout(){
        return view('user/logout');
    }
    
    public function postLogout(){
        return view('/welcome');
    }
    
    public function index(Request $request)
    {
        
        $user = Auth::user();
        return view('user.index', compact('user'));
    }
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        //var_dump($user);
        
        return view('user.edit', compact('user'));
    }
    
     public function update(Request $request)
    {
        
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
        ];
        //var_dump($param);
        $user = User::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
       
        $user_id = Auth::id(); 
        $user = User::where('id', $user_id)->first();//これでユーザー情報渡してるはずが渡せてない‥。
        $flash_message = "会員情報を編集しました。";
        return redirect()->route('user.edit')->with(compact('user','flash_message'));
        //return view('user.edit', compact('user'));
    }
   
    //退会機能ためにwithdrawalアクションを作成
    public function withdrawal()
    {
        $user_id = Auth::id();//ログインユーザーのidを取得。
        $user = User::where('id', $user_id)->first();//上で取得したidと同じidを持つレコードをusersテーブルら取得。
        $msg = "";
        return view('user.destroy',compact('user','msg'));    
    }
    
    //退会機能ためにdestroyアクションを作成。ここでしてる退会は論理削除。userテーブル含め、全てのテーブルにレコードは残る。
    public function destroy(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        //var_dump($user);
        if(Auth::check() && Auth::id() == $user->id )
        {
            $user->delete();
            return redirect('/');    
        } else{
            $msg = "何らかの理由で退会処理できませんでした。";
            return view('user.destroy', compact('user'));    
        }
        
    }
    
    public function term()
    {
        return view('user/term');
    }
    
    public function question()
    {
        return view('user/question');
    }
    
    public function policy()
    {
        return view('user/policy');
    }


    
}
