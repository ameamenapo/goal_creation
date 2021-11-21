<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\Goal_list;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
     public function index(Request $request, Person $person)
    {
        $person = Auth::user();
        return view('person.index');
    }
    
    
    public function getSignup(Request $request){
        return view('person.signup');    
    }
    
    public function postSignup(Request $request){
  // バリデーション
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|unique:people',
            'password' => 'required|min:8',
            'password_confirmation' => 'required',
        ]);
 
  // DBインサート
        $person = new Person([
            'name' => $request->input('name'),
            'birthday' => $request->input('birthday'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'password_confirmation' => bcrypt($request->input('password_confirmation')),
        ]);
 
  // 保存
        $person->save();
 
  // リダイレクト
        return view('person.index');
    }

    
    public function getLogin(Request $request)
    {
        return view('person.login');    
    }
    
    public function postLogin(Request $request)
    {
        
        $this->validate($request,[
        'email' => 'email|required',
        'password' => 'required|min:8'
        ]);
        
        $person = Person::where('email', $request->email)->get();
        if (count($person) === 0){
            return view('person/login');
        } else {
            $request->session()->flash('status', 'ログインしました');
            return view('person/index');
        }
        
        //if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            //return view('person.index');
        //}
        //else{
            //return view('person.login');   
        //}    
        

        //if (Auth::check()) {
            //return view('person/index');
        //}
        
        //if (Hash::check($request->password, $person[0]->password)) { //$user[0]の意味は？なぜ[0]必要？
            
            // セッション
            //session(['name'  => $person[0]->name]);
            //session(['email' => $person[0]->email]);
            
            // フラッシュ
            //$request->session()->flash('status', 'ログインしました。');
            //var_dump($person); 
            //return redirect('person');
        // 不一致    
       // }else{
            //return view('person/login');
        //}
    }
    
}
