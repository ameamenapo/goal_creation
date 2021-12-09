<?php

namespace App\Http\Controllers;

use App\Models\Goal_list;
use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Goal_listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //下のconstrunt()は、ログインユーザーでないと各viewにgetアクセスできないように設定している。
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
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
     * @param  \App\Models\Goal_list  $goal_list
     * @return \Illuminate\Http\Response
     */
    public function show(Goal_list $goal_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal_list  $goal_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal_list $goal_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal_list  $goal_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal_list $goal_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal_list  $goal_list
     * @return \Illuminate\Http\Response
     */
    //自分の作った目標を削除するアクション。
    public function delete(Request $request)
    {   
        $user_id = Auth::id();
        $item = Goal_list::where('user_id', $user_id)->first();
        return view('goal_list.delete', ['item' => $item]);
    }
    
    //自分の作った目標を削除するアクション。
    public function remove(Request $request)
    {
        // $request はユーザーが入力した、送っている情報。
        //下のdestroy($request->id)の中の$request->idは、goal_list/deleteビューでinputタグの中でname="id"、
        //つまりプロパティをidに指定しているから。リクエストで入ってきた情報にアクセスする際はnameプロパティをrequestの矢印の後にしているす。
        Goal_list::destroy($request->id);
        return redirect('/goal/list2');
    }
    
    public function today_goal(Request $request)
    {
        //var_dump($request->id);
        
        $items = Goal_list::where('id', $request->id)->get();
        //$items = Goal_list::find($request->id);
        //var_dump($request->all());
        //$items = Goal::find($request->id);
        //var_dump($items);
        return view('goal.today_goal', ['items'=> $items]);
    }
    
    public function register(Request $request)
    {
        $param = [
            'classification' => $request->classification,
            'theme' => $request->theme,
            'first_day' => $request->first_day,
            'second_day' => $request->second_day,
            'third_day' => $request->third_day,
            'fourth_day' => $request->fourth_day,
            'fifth_day' => $request->fifth_day,
            'sixth_day' => $request->sixth_day,
            'seventh_day' => $request->seventh_day,
            'user_id' => $request->user_id,
            ];
        
        $goal = new Goal;
        $form = $request->all();
        //var_dump($form);
        unset($form['_token']);
        $goal->fill($form)->save();
        $items = Goal_list::with('goal')->where('id', $request->id)->get();
        
        //var_dump($param);
        return view('goal.index', ['items' => $items]);
        //return view('goal.index', ['goal' => $goal]);
    }
    
}
