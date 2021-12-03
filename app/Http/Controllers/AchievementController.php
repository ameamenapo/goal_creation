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
        $user_id = Auth::id();
        //$items = Achievement::where('user_id', $user_id)->where('progress', 7)->get(); ペジネーション機能なしのやつ。
        $items = Achievement::where('user_id', $user_id)->where('progress', 7)->paginate(1);
        return view('goal.achievement', ['items'=> $items]);
    }
    
    public function first_post(Request $request)
    {
        $user_id = Auth::id();
        //上記でログインユーザーのidを取得し$user_idに代入しておく。そうすると、以下のif文の中の$formにおいて変数$user_idが使える。
        // $data
        // $goal
        // $items の名前に意味がない。
        // 単数のものに複数形の名前をつけてる。
        // DB は使わない
        // Model: Achievement を使う
        
        // データを取得
        // $item = Model::....

        // achievementsのプログレスはデフォルトで0
        
        // $request->id には何が入っている？
        // => goal_idが入っている
        
        // ->where('id',$request->id) の指定は本当に正しい？
        // idとgoal_idは違う。
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())//Modelでレコードの存在判定。achievementテーブルに、同じgoal_idを持ったレコードが存在するかどうかを確かめている。
        //上記の'goal_id'はachievementテーブルのgoal_idカラムの値のこと、$request->idはrequestで入ってきたgoalsテーブルのid。
        //if(DB::table('achievements')->where('goal_id',$request->id)->exists()) //DBでのレコードの存在判定。
        {
            //$items = Goal::where('id',$request->id)->get();
            //$items = Achievement::where('goal_id', $request->todo)->first();
            $item = Goal::find($request->todo);//idかtodoか
            $msg = '１日目の目標はクリアしています。';
            //return view('goal.first_day', compact('items','msg'));
            return view('goal.first_day', compact('item','msg'));  
        } else {
            $item = Goal::where('id',$request->todo)->first();
            //var_dump($item);
            $form = [
                'theme' => $item->theme,
                'progress' => 1,
                'user_id' => $user_id, 
                'goal_id' => $item->id,
            ];
            //var_dump($form);
            $achievement = new Achievement;
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first(); //idかtodoか
            //$items = Goal::where('id',$request->id)->get();
            $msg = 'やったね！';
            //var_dump($item);
            return view('goal.first_day', compact('item','msg')); 
            //return view('goal.first_day', compact('items','msg')); 
        }
            
    }
      
    
    public function second_post(Request $request)
    {
        $user_id = Auth::id();
       
        if(Achievement::where('goal_id', '=', $request->todo)->exists())//$request->idじゃなくて$request->todoかも
        {   
            $achievement = Achievement::where('goal_id', $request->todo)->first();
            if ($achievement->progress === 1){
                
            
            $form = [
                'theme' => $achievement->theme,
                'progress' => 2,
                'user_id' => $user_id, // user_idはログインユーザーのIDを取得する
                'goal_id' => $achievement->goal_id,
            ];
            var_dump($form);
            $achievement = Achievement::where('goal_id', $request->todo)->first(); 
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first();//ここをget();にすると、ビューの表示ができなくなる。なぜ？
            var_dump($item);
            $msg = 'やったね！';
            return view('goal.second_day', compact('item','msg')); 
            } else {
                $item = Goal::where('id',$request->todo)->first();//ここをget();にすると、ビューの表示ができなくなる。なぜ？
                $msg = '２日目の目標はクリアしています。';
                var_dump($item);
                return view('goal.second_day', compact('item','msg'));     
            }
        } else {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ１日目の目標がクリアできていません。';  //つまり、まだ１日目をクリアしてないからこのgoal_idを持つレコード自体が
            return view('goal.second_day', compact('item','msg')); //achievementテーブルにないから、まず１日目クリアしてレコード作ってねってこと。
        }
       
        
    }
    
    
    public function third_post(Request $request)
    {
        $user_id = Auth::id();
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())
        //var_dump($request);　どんな一文であろうと、ifの後に挟んでしまうとエラーになる。このアクショn実行するときは必ずif()とその後の{に文章を挟まないように！
        {   
            $achievement = Achievement::where('goal_id', $request->todo)->first(); //achievementテーブルの中に。requestで入ってきたデータと同じgoal_idを持つレコードを取得。
        
            if ($achievement->progress === 2){
                $form = [
                    'theme' => $achievement->theme,
                    'progress' => 3,
                    'user_id' => $user_id, 
                    'goal_id' => $achievement->goal_id,
                ];
                
                $achievement = Achievement::where('goal_id', $request->todo)->first(); 
                $achievement->fill($form)->save();
                $item = Goal::where('id',$request->todo)->first();
                //var_dump($item);
                $msg = 'やったね！';
                return view('goal.third_day', compact('item','msg'));     
                } elseif ($achievement->progress === 1) {
                $item = Goal::where('id',$request->todo)->first();
                $msg = 'まだ２日目の目標がクリアできていません。';
                return view('goal.third_day', compact('item','msg'));     
                } else {
                //$item = Achievement::where('goal_id', $request->todo)->first();
                $item = Goal::where('id',$request->todo)->first();
                $msg = '３日目の目標はクリアしています。';
                return view('goal.fourth_day', compact('item','msg'));    
            }
            
        } else {
             $item = Goal::where('id',$request->todo)->first();
             $msg = '１日目の目標からやってみましょう。';
             return view('goal.first_day', compact('item','msg'));  
        }
        
    }
    
    
    public function fourth_post(Request $request)
    {
        $user_id = Auth::id();
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())
        {
            $achievement = Achievement::where('goal_id', $request->todo)->first();
            if ($achievement->progress === 3) {
                $form = [
                    'theme' => $achievement->theme,
                    'progress' => 4,
                    'user_id' => $user_id, 
                    'goal_id' => $achievement->goal_id,
            ];
                
            $achievement = Achievement::where('goal_id', $request->todo)->first(); 
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'やったね！';
            return view('goal.fourth_day', compact('item','msg'));     
            } elseif ($achievement->progress === 2) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = '３日目の目標がクリアできていません。';
            return view('goal.fourth_day', compact('item','msg'));
            } elseif ($achievement->progress === 1) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = '2日目の目標がクリアできていません。';
            return view('goal.fourth_day', compact('item','msg')); 
            } else {
                $item = Goal::where('id',$request->todo)->first();
                $msg = '４日目の目標はクリアしています。';
                return view('goal.fourth_day', compact('item','msg'));     
            } 
            
        } else {
             $item = Goal::where('id',$request->todo)->first();
             $msg = '１日目の目標からやってみましょう。';
             return view('goal.first_day', compact('item','msg'));  
        }
    }
    
    public function fifth_post(Request $request)
    {
        $user_id = Auth::id();
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())
        {
            $achievement = Achievement::where('goal_id', $request->todo)->first();
            if ($achievement->progress === 4) {
                $form = [
                    'theme' => $achievement->theme,
                    'progress' => 5,
                    'user_id' => $user_id, 
                    'goal_id' => $achievement->goal_id,
            ];
            
            $achievement = Achievement::where('goal_id', $request->todo)->first(); 
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first();
            //var_dump($item);
            $msg = 'やったね！';
            return view('goal.fifth_day', compact('item','msg'));     
            } elseif ($achievement->progress === 3) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = '４日目の目標がクリアできていません。';
            return view('goal.fifth_day', compact('item','msg'));
            } elseif ($achievement->progress === 2) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = '3日目の目標がクリアできていません。';
            return view('goal.fifth_day', compact('item','msg'));
            } elseif ($achievement->progress === 1) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = '2日目の目標がクリアできていません。';
            return view('goal.fifth_day', compact('item','msg'));
            } else {
                $item = Goal::where('id',$request->todo)->first();
                $msg = '５日目の目標はクリアしています。';
                return view('goal.fifth_day', compact('item','msg'));     
            } 
            
        } else {
             $item = Goal::where('id',$request->todo)->first();
             $msg = '１日目の目標からやってみましょう。';
             return view('goal.first_day', compact('item','msg'));  
        }
    }
    
    public function sixth_post(Request $request)
    {
        $user_id = Auth::id();
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())
        {
            $achievement = Achievement::where('goal_id', $request->todo)->first();
            if ($achievement->progress === 5) {
                $form = [
                    'theme' => $achievement->theme,
                    'progress' => 6,
                    'user_id' => $user_id, 
                    'goal_id' => $achievement->goal_id,
            ];
            $achievement = Achievement::where('goal_id', $request->todo)->first(); 
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first();
            //var_dump($item);
            $msg = 'やったね！';
            return view('goal.sixth_day', compact('item','msg'));     
            } elseif ($achievement->progress === 4) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ５日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 3) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ4日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 2) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ3日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 1) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ2日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } else {
                $item = Goal::where('id',$request->todo)->first();
                $msg = '６日目の目標はクリアしています。';
                return view('goal.sixth_day', compact('item','msg'));     
            } 
            
        } else {
             $item = Goal::where('id',$request->todo)->first();
             $msg = '１日目の目標からやってみましょう。';
             return view('goal.first_day', compact('item','msg'));  
        }
    }
    
    public function seventh_post(Request $request)
    {
        $user_id = Auth::id();
        
        if(Achievement::where('goal_id', '=', $request->todo)->exists())
        {
            $achievement = Achievement::where('goal_id', $request->todo)->first();
            if ($achievement->progress === 6) {
                $form = [
                    'theme' => $achievement->theme,
                    'progress' => 7,
                    'user_id' => $user_id, 
                    'goal_id' => $achievement->goal_id,
            ];
            $achievement = Achievement::where('goal_id', $request->todo)->first(); 
            $achievement->fill($form)->save();
            $item = Goal::where('id',$request->todo)->first();
            //var_dump($item);
            $msg = 'やったね！';
            return view('goal.seventh_day', compact('item','msg'));     
            } elseif ($achievement->progress === 5) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ６日目の目標がクリアできていません。';
            return view('goal.seventh_day', compact('item','msg'));
            } elseif ($achievement->progress === 4) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ５日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 3) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ4日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 2) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ3日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } elseif ($achievement->progress === 1) {
            $item = Goal::where('id',$request->todo)->first();
            $msg = 'まだ2日目の目標がクリアできていません。';
            return view('goal.sixth_day', compact('item','msg'));
            } else {
                $item = Goal::where('id',$request->todo)->first();
                $msg = 'このテーマの目標は全てクリアしています。';
                return view('goal.seventh_day', compact('item','msg'));     
            }
            
        } else {
             $item = Goal::where('id',$request->todo)->first();
             $msg = '１日目の目標からやってみましょう。';
             return view('goal.first_day', compact('item','msg')); 
        }
    }
    

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
