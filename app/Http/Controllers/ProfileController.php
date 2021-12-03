<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();//Profileモデルファイルで、user_idを$fillableに移さないと、$user_idにdefaurtバリューないよっていう1364エラーになる。
        //$profile = Profile::where('user_id', $user_id)->first();
        //var_dump($profile);
        //return view('profile.index', compact('profile'));
        
        //以下、新しくかいたコード こちらのコードでも動く。
        //$profile = Profile::where('user_id', $user_id)->first();
            //if (empty($profile)) {
                //Profile::create([
                //'nickname' => '名無しさん',
                //'profile_image' => 'default.png',
                //'hobby' => '',
                //'a_word' => '',
                //'user_id' => $user_id,
            //]);
        
            //$profile = new Profile;
            //$profile->fill($form)->save();
            //$profile = Profile::where('user_id', $user_id)->first();
            //return view('profile.index', compact('profile'));
            //} else{
               // $profile = Profile::where('user_id', $user_id)->first();
                //var_dump($profile);
                //return view('profile.index', compact('profile'));        
            //}
        
        if(Profile::where('user_id', '=', $user_id)->exists())
        {
            $profile = Profile::where('user_id', $user_id)->first();
            //var_dump($profile);
            return view('profile.index', compact('profile'));    
        } else {
            
            $form = [
                'nickname' => '名無しさん',
                'profile_image' => 'default.png',
                'hobby' => '',
                'a_word' => '',
                'user_id' => $user_id,
            ];
            //var_dump($form);
            $profile = new Profile;
            $profile->fill($form)->save();
            $profile = Profile::where('user_id', $user_id)->first();
            return view('profile.index', compact('profile'));
        } 
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $user_id = Auth::id();
        
        if ($file = $request->profile_image) {
            $fileName = $file->getClientOriginalName();
            //$target_path = public_path();
            //$file->move($target_path, $fileName);
            $file = $request->profile_image->storeAs('',$fileName); 
        } else {
            $fileName = "default.png";
        }
        
        $profile = new Profile;
        var_dump($profile);
        var_dump($fileName);
        $profile->id = $request->id;
        $profile->nickname = 'ナポ';
        //$profile->profile_image = $request->profile_image->store('storage/app/public');//これ本当にいらないやつ
        $profile->profile_image = $request->profile_image->store('');
        $profile->age = $request->age;
        $profile->hobby = $request->hobby;
        $profile->a_word = $request->a_word;
        $profile->user_id = $user_id;
        //$profile->profile_image = $fileName;
        $profile->save();
        
        $profile = Profile::where('user_id', $user_id)->first();
        
        return view('profile.index',compact('profile'));    
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function add(Profile $profile)
    {
        $user_id = Auth::id();
        $msg = "プロフィールを入力してください";
        return view('profile.add',compact('msg'));     
    }
    
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $param = [
            'nickname' => $request->nickname,
            'age' => $request->age,
            'hobby' => $request->hobby,
            'a_word' => $request->a_word,
            'profile_image' => $request->profile_image,
            //'user_id' => $request->user_id,
            'user_id' => $user_id,
        ];
        var_dump($param);
        $profile = new Profile;
        //var_dump($profile);
        $form = $request->all();
        unset($form['_token']);
        $profile->fill($form)->save();
        return view('profile.add', ['msg'=>'プロフィールを作成しました！']);   
    }
    public function edit(Profile $profile)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
