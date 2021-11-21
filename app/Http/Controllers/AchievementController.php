<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Goal;
use App\Models\Goal_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('goal.achievement');
    }
    
    public function first_post(Request $request)
    {
        $items = Goal::where('id',$request->id)->first();
        $form = [
            'theme' => $items->theme,
            'progress' => 1,
            'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            'goal_id' => $items->id,
        ];
        //var_dump($form);
        $achievement = new Achievement;
        $achievement->fill($form)->save();
        //$items = Achievement::find($request->first_day);これだと「やったね」おしてpostした時にテーマとか入らない。
        $items = Goal::where('id',$request->id)->get();//足したやつ
        var_dump($items);
        $msg = 'やったね！';
        return view('goal.first_day', compact('items','msg'));    
    }
    
    public function second_post(Request $request)
    {
        $items = Goal::where('id',$request->id)->first();
        $form = [
            'theme' => $items->theme,
            'progress' => 2,
            'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            'goal_id' => $items->id,
        ];
        //var_dump($form);
        //$achievement = new Achievement;
        $achievement = Achievement::where('id', $request->first_day)->first(); 
        $achievement->fill($form)->save();
        $items = Goal::where('id',$request->id)->get();
        var_dump($items);
        $msg = 'やったね！';
        return view('goal.second_day', compact('items','msg')); 
        
        //$achievement = Achievement::where('id', $request->first_day)->first(); 
        //$achievement->fill($form)->save();
        //$items = Achievement::find($request->first_day);
        //$msg = 'クリア！';
        //return view('goal.achievement', compact('items','msg'));
        
    }
    
    
    
    
    
    //public function post(Request $request) ここからしばらく古いpostアクション。
    //{
        
        //$items = Goal::where('id', $request->first_day)->first();
        //var_dump($items);
         //$form = [
            //'theme' => $items->theme,
            //'progress' => 1,
            //'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            //'goal_id' => $items->id,
        //];
        
        //$achievement = Achievement::where('id', $request->first_day)->first(); 
        //$achievement->fill($form)->save();
        //$items = Achievement::find($request->first_day);
        //$msg = 'クリア！';
        //var_dump($items);
        //return view('goal.achievement', compact('items','msg'));
        
    //}ここまでが古いpostアクション。
    
    //public function second_post(Request $request) 
    //{
        
        //$items = Goal::where('id', $request->first_day)->first();
       
        //var_dump($items);
         //$form = [
            //'theme' => $items->theme,
            //'progress' => 2,
            //'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            //'goal_id' => $items->id,
       // ];
        
        //$achievement = Achievement::where('id', $request->first_day)->first(); 
        //$achievement->fill($form)->save();
        //$items = Achievement::find($request->first_day);
        //$msg = 'クリア！';
        //return view('goal.achievement', compact('items','msg'));
    
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
