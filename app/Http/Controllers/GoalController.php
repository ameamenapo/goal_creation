<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Goal_list;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Request as PostRequest;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Goal $goal)
    {
        // モデルファイルを使っていない。
        // MVC それぞれでファイルが分かれる。
        $items = Goal::all();
        
        // リダイレクトについて
        // 別のURLへ遷移、移動させること
        // Googleへ飛ぶ
        // redirect('http://google.com');
        return view('goal.index', ['items'=> $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function add(Request $request)
    {
        return view('goal.add', ['msg'=>'目標を作成してください']);
    }
   
    public function create(Request $request)
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

        $goal_list = new Goal_list;
        //var_dump($goal_list);
        $form = $request->all();
        unset($form['_token']);
        $goal_list->fill($form)->save();
        return view('goal.add', ['msg'=>'目標を作成しました！']);
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
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $items = Goal_list::find($request->id);
        return view('goal.edit', ['item' => $items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal_list $goal_list)
    {
        $param = [
            'id' => $request->id,
            'theme' => $request->theme,
            'first_day' => $request->first_day,
            'second_day' => $request->second_day,
            'third_day' => $request->third_day,
            'fourth_day' => $request->fourth_day,
            'fifth_day' => $request->fifth_day,
            'sixth_day' => $request->sixth_day,
            'seventh_day' => $request->seventh_day,
        ];
        
        $goal_list = Goal_list::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $goal_list->fill($form)->save();
        return view('goal.add', ['msg'=>'目標を編集しました！']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        //
    }
    
    public function choose(Request $request, Goal $goal)
    {
        return view('goal.list');
    }
    
    public function choose1(Request $request, Goal $goal)
    {
        $items = Goal_list::where('classification', 1)->get();
        //var_dump($items);
        return view('goal.list1', ['items' => $items]);
    }
    
    public function choose2(Request $request, Goal $goal)
    {
        // var_dump(Auth::user());
        //var_dump(Auth::id());
        $user_id = Auth::id(); 
        $items = Goal_list::where('user_id', $user_id)->get();
        //var_dump($items);
        //viewの方完成させたら上の->get()を->simplePaginate(10)とかに変えてページ数動かせるようになりたい。
        return view('goal.list2', ['items' => $items]);
    }

    
    public function choose3(Request $request, Goal $goal)
    {
        // 条件:
        // ログインユーザー以外の人が作った目標
        $user_id = Auth::id();
        $items = Goal_list::where('user_id', '!=', $user_id)->where('user_id', '!=', 4 )->get();
        //var_dump($items);
        //$items = Goal_list::where('user_id', '<>', $user_id)->get();の方が対応しているDB多いらしい。
        return view('goal.list3', ['items' => $items]);
    }

    /**
     * PHPDoc
     * 
     * このメソッドでやることを書く。
     * ex.goal_listビューから選んだ目標を、goals へ登録する
     **/
    public function register(Request $request)
    {
        //registerアクションの作り方。
        // list1・2・3のビューで選んだテーマ（postされたtheme）のvalueはinputの中にある"{{$item->id}}"。nameがthemeになってるけど、あくまでvalueは"{{$item->id}}"。
        //上記の"{{$item->id}}"には、chooseアクションから入ってきたgoal_listsテーブルのidが入っている。
        //今、このregister(Request $request)には、そのgoal_listsテーブルのidが入っている状態。
        //よって、ここではそのidを使って、goal_listsテーブルから情報（レコード）が取れる状態になっている。
        //registerアクションでのregister(Request $request)の$requestに入ってくる値、つまりvalueは{{$item->id}}（goal_listsテーブルのid）だから、
        //$items = Goal_list::where('id', $request->theme)->first();でやってることは、goal_listsテーブルのidカラムと取得されたvalue（つまり{{$item->id}}）が同じだったら、
        //それを取得してitemsに代入してね！って意味かな？故にこれで正しいレコードが取得できる。
        //where('id', $request->theme)のthemeはプロパティ、つまり、list1でinputタグの中にあるname=〇〇ってなってるところの、nameの値。
        //だから、$requestの矢印の先にはnameに代入されているものになる。だからthemeを指定している。
        //1 goal_listsテーブルから該当のidを持つレコードを取得する。
        //2 goalテーブルに登録する。（saveメソッド。saveメソッドを使うと$goal->fill($form)->save();といった書き方になるから、$formの中身や定義が必要になる。
        //ただ、$formは$paramでもなんでもOK。ここでは$formとしているだけ。）
        //3 returnする。ビューで表示したい情報を渡す。（$formに入ってる情報全部itemsに入って渡せているので、today_goalビューではちゃんとthemeもfirst_dayも表示される。)
        
        $items = Goal_list::where('id', $request->theme)->first();
        //var_dump($items);
        // goal_listsのidがあれば、全データは取れる。idが必要。
        // 以下はPOSTをまとめたもの。
        $form = [
            'theme' => $items->theme,
            'first_day' => $items->first_day,
            'second_day' => $items->second_day,
            'third_day' => $items->third_day,
            'fourth_day' => $items->fourth_day,
            'fifth_day' => $items->fifth_day,
            'sixth_day' => $items->sixth_day,
            'seventh_day' => $items->seventh_day,
            'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
        ];
        
        //unset($form['_token']);ユーザーが送った情報にトークンが含まれていた時、削除するために使うのがこれ。
        //registerアクションではgoal_listsテーブルかあの値を取得してgoalsテーブルにデータを移動しているだけだから、unset($form['_token']);はここで書かなくてもいいみたい。。
        // unsetはあくまでCSRF対策て使っていたのもの。
        
        // $formはどういうものが必要か。以下の$formはテスト的に書いたもの。
        // 以下２１４からの９行でちゃんとgoalsテーブルにテーマとfirst_dayの値は保存されるし、today_goalビューも正しく動く。
        //$form = [
            //'theme' => 1,
            //'first_day' => '1日目',
        //];
        $goal = new Goal;
        $goal->fill($form)->save();
        $items = Goal::all();
        //var_dump($items);
        return view('goal.index', compact('items'));
       
        
    }
    
    public function delete(Request $request, Goal $goal)
    {
        $items = Goal::where('id', $request->id)->get(); //->get();をたすと。例えばdel_list?id=6でゲットアクセスした際に、ちゃんとそのidのテーマがチェックボックス付きで現れた。
        // var_dump($items);
        //return view('goal.del_list', compact('items'));
        return view('goal.del_list', ['items' => $items]);
    }
    
    public function remove(Request $request, Goal $goal)
    {
        // $request はユーザーが入力した、送っている情報
        //var_dump($request->all());
        $items = Goal::find($request->id);
        Goal::destroy($request->id);
        var_dump($items);
        //$items = $request->all();
        //return view('goal.index', compact('items'));
        //return view('goal.index', ['items' => $items]);ここら辺のコードはどれも上手くいかなかった。redirect文にしたら無事goal.indexを表示できた。
        return redirect('/goal');
    }
    
    public function today_goal(Request $request)
    {
        $items = Goal::where('id',$request->id)->get();
        var_dump($items);
        return view('goal.today_goal', compact('items'));//この３行は無難に動くやつ。しかしachieevementインスタンス（progress=0）を作らない。
        //$items = Goal::where('id',$request->id)->first();
        //$form = [
            //'theme' => $items->theme,
            //'progress' => 0,
            //'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            //'goal_id' => $items->id,
       // ];
        //var_dump($form);
        //$achievement = new Achievement;
        //$achievement->fill($form)->save();
        ////$items = Achievement::find($request->first_day);
        //var_dump($items);
        //return view('goal.today_goal', compact('items')); 
    }
    
    public function first_day(Request $request)
    {
        $items = Goal::where('id',$request->id)->get();
        $msg = '';
        var_dump($items);
        return view('goal.first_day', compact('items','msg'));     
    }
    
    public function second_day(Request $request)
    {
        $items = Goal::where('id',$request->id)->get();
        $msg = '';
        var_dump($items);
        return view('goal.second_day', compact('items','msg'));     
    }
    
    //以下からした、$msg='７日目：'とか書いてあるあたりまで前に作ったtoday_goalコントローラ。'
    //public function today_goal(Request $request)//ここでAchievementテーブルから同じgoal_iidのレコード取得して、一緒にgoal.today_goalビューに渡したい！
    //{
        //$items = Goal::where('id',$request->id)->first();
        
        //$form = [
            //'theme' => $items->theme,
            //'progress' => 0,
            //'user_id' => Auth::id(), // user_idはログインユーザーのIDを取得する
            //'goal_id' => $items->id,
        //];
        //var_dump($form);
        //$achievement = new Achievement;
        //$achievement->fill($form)->save();
        //以下の、$data=Achievement〜というコード、->getにするとエラーが出るので、firstじゃないとダメみたい。
        //$data = Achievement::where('goal_id',$request->id)->first(); //これと次の行のは足したコード。この二行消して一番下のreturn〜復活させれば動く。
        //var_dump($data);
        //if($data->progress ===0){
            //$items = Goal::where('id',$request->id)->get();
            //var_dump($items);
            //$msg ='１日目：';
            //return view('goal.today_goal', compact('items','msg'));
        //}
        //elseif($data->progress ===1) {
            //$msg ='２日目：';
            //return view('goal.second_day',compact('items','msg'));    
        //}
        //elseif($data->progress ===2) {
            //$msg ='３日目：';
            //return view('goal.third_day',compact('items','msg'));    
        //}
        //elseif($data->progress ===3) {
            //$msg ='４日目：';
            //return view('goal.third_day',compact('items','msg'));    
        //}
        //elseif($data->progress ===4) {
            //$msg ='５日目：';
            //return view('goal.third_day',compact('items','msg'));    
        //}
        //elseif($data->progress ===5) {
            //$msg ='６日目：';
            //return view('goal.third_day',compact('items','msg'));    
        //}
        //else {
            //$msg ='７日目：';
            //return view('goal.third_day',compact('items','msg'));    
        //}
       
    //} //ここまで前に作ったgoal_todayアクション
}
