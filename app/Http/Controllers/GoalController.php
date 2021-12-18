<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Goal_list;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\ServiceProvider;//ペジネーションのため追記
use Illuminate\Support\Collection; //ペジネーションのため追記
use Illuminate\Pagination\LengthAwarePaginator; //ペジネーションのため追記
use Illuminate\Pagination\Paginator;//ペジネーションのため追記。でも実際は上の３つはいらないかも。
//use Request as PostRequest;

class GoalController extends Controller
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
    
    public function index(Request $request, Goal $goal)
    {
        $user_id = Auth::id(); 
        $items = Goal::where('user_id', $user_id)->paginate(6);
        //var_dump($items);
        //$items = Goal::where('user_id', $user_id)->get();　ぺ時ネーション機能がついてない時のコード。
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
        $error = "";
        $msg = "目標を作成してください";
        return view('goal.add', compact('error','msg'));
    }
   
    public function create(Request $request)
    {
        $goal_theme = $request->theme;
    
        if( empty($goal_theme) )
        {
            $error = "ーー テーマを入力してください ーー";
            $msg = "目標を作成してください";
            return view('goal.add', compact('error','msg'));
        } else {
            
        
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
        $error = "";
        $msg = "目標を作成しました";
        return view('goal.add', compact('error','msg'));
        }
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
        //$user_id = Auth::id();
        //$item = Goal_list::where('user_id', $user_id)->first();
        $item = Goal_list::find($request->id);
        //var_dump($item);
        $error = "";
        $msg = "";
        return view('goal.edit', compact('item','msg', 'error'));
        
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
        
        $goal_theme = $request->theme;
        
        if( empty($goal_theme) )
        {
            $item = Goal_list::find($request->id);
            $error = "ーー テーマを入力してください ーー";
            $msg = "目標を作成してください";
            return view('goal.edit', compact('item', 'error','msg'));
        } else {
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
            //var_dump($param);
            $goal_list = Goal_list::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $goal_list->fill($form)->save();
            $item = Goal_list::find($request->id);
            $error = "";
            $msg = '目標を編集しました！';
            return view('goal.edit', compact('item','msg', 'error'));
            }
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
        //$msg = "";
        //return view('goal.list', compact('msg'));  なぜメッセージ持たせたか思い出せない‥。
    }
    
    public function choose1(Request $request, Goal $goal)
    {
        //$items = Goal_list::where('classification', 1)->get(); ペジネーション機能つけてない時のコード。
        $items = Goal_list::where('classification', 1)->paginate(6);
        return view('goal.list1', ['items' => $items]);
    }
    
    public function choose2(Request $request, Goal $goal)
    {
        $user_id = Auth::id(); 
        //$items = Goal_list::where('user_id', $user_id)->get(); ペジネーション機能つけてない時のコード。
        $items = Goal_list::where('user_id', $user_id)->paginate(6);
        //var_dump($items);
        return view('goal.list2', compact('items'));
    }

    
    public function choose3(Request $request, Goal $goal)
    {
        // 条件:
        // ログインユーザー以外の人が作った目標
        $user_id = Auth::id();
        $items = Goal_list::where('user_id', '!=', $user_id)->where('classification', '!=', 1)->paginate(6);
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
    public function register1(Request $request)
    {
        if(isset( $request->theme )){
        $items = Goal_list::where('id', $request->theme)->first();
        //var_dump($items);
        
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
        
        $goal = new Goal;
        $goal->fill($form)->save();
        $user_id = Auth::id(); 
        //$items = Goal::where('user_id', $user_id)->get();ペジネーション機能つけない時のやつ。
        $items = Goal_list::where('user_id', $user_id)->paginate(6);
        //var_dump($items);
        //return view('goal.index', compact('items'));
        //return view('goal.list1', compact('items'));元のコード
        $flash_message = "目標を登録しました。";
        return redirect()->route('goal.list1')->with(compact('items','flash_message'));
        } else {
            $msg = "目標がありません";
            $items = Goal_list::where('id', $request->theme)->paginate(6);
            return view('goal.list1', compact('msg', 'items'));    
        }    
        
    }
    
    public function register2(Request $request)
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
        
        //下記は、$request->themeに何も入ってなければ、つまり、目標リストに一つも目標がない状態で登録ボタンを押しても目標は選べないから、
        //絶対、$request->themeはnullじゃだめだよというコード。
        
        
        if(isset( $request->theme )){
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
        $user_id = Auth::id(); 
        //$items = Goal::where('user_id', $user_id)->get();ペジネーション機能つけない時のやつ。
        $items = Goal_list::where('user_id', $user_id)->paginate(6);
        //var_dump($items);
        //return view('goal.index', compact('items'));
        //return view('goal.list2', compact('items'));元のコード
        $flash_message = "目標を登録しました。";
        return redirect()->route('goal.list2')->with(compact('items','flash_message'));
        
        } else{
            $msg = "目標がありません";
            $items = Goal_list::where('id', $request->theme)->paginate(6);
            return view('goal.list2', compact('msg', 'items'));
        }
    }
    
    public function register3(Request $request)
    {
        
        if(isset( $request->theme )){
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
        
        $goal = new Goal;
        $goal->fill($form)->save();
        $user_id = Auth::id(); 
        //$items = Goal::where('user_id', $user_id)->get();ペジネーション機能つけない時のやつ。
        $items = Goal::where('user_id', $user_id)->paginate(6);
        //var_dump($items);
        //return view('goal.index', compact('items'));
        //return view('goal.list3', compact('items'));元のコード
        $flash_message = "目標を登録しました。";
        return redirect()->route('goal.list3')->with(compact('items','flash_message'));
        
        } else {
            $msg = "目標がありません";
            $items = Goal_list::where('id', $request->theme)->paginate(6);
            return view('goal.list3', compact('msg', 'items'));    
        }
    }
    
    public function delete(Request $request, Goal $goal)
    {   
        $user_id = Auth::id();
        //$items = Goal::where('id', $request->id)->get(); //->get();をたすと。例えばdel_list?id=6でゲットアクセスした際に、ちゃんとそのidのテーマがチェックボックス付きで現れた。
        $items = Goal::where('user_id', $user_id)->get();
        //var_dump($items);
        //return view('goal.del_list', compact('items'));
        return view('goal.del_list', ['items' => $items]);
    }
    
    public function remove(Request $request, Goal $goal)
    {
        // $request はユーザーが入力した、送っている情報
        //var_dump($request->all());
        Goal::destroy($request->theme);
        $user_id = Auth::id();//ユーザーidを取得
        $items = Goal::where('user_id', $user_id)->get();//del_listビューにredirectするにはitems定義しないと渡せない。
        $flash_message = "目標を削除しました。";
        return redirect()->route('goal.del_list')->with(compact('items','flash_message'));
        //return redirect('/goal');
    }
    
    public function today_goal(Request $request)
    {
        $items = Goal::where('id',$request->id)->get();
        $msg = '';
        //var_dump($items);
        return view('goal.today_goal', compact('items', 'msg'));
        
    }
    
    public function first_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        //$items = Goal::where('id',$request->id)->get();
        $msg = '';
        //var_dump($item);
        return view('goal.first_day', compact('item','msg')); 
        //return view('goal.first_day', compact('items','msg'));     
    }
    
    public function second_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        //$items = Goal::where('id',$request->id)->get();
        $msg = '';
        //var_dump($items);
        return view('goal.second_day', compact('item','msg')); 
        //return view('goal.second_day', compact('items','msg'));     
    }
    
    public function third_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        //$items = Goal::where('id',$request->id)->get();
        $msg = '';
        //var_dump($item);
        return view('goal.third_day', compact('item','msg'));
        //return view('goal.third_day', compact('items','msg'));     
    }
    
    public function fourth_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        //$items = Goal::where('id',$request->id)->get();
        $msg = '';
        //var_dump($items);
        return view('goal.fourth_day', compact('item','msg'));
        //return view('goal.fourth_day', compact('items','msg'));     
    }
    
    public function fifth_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        $msg = '';
        //var_dump($items);
        return view('goal.fifth_day', compact('item','msg'));     
    }
    
    public function sixth_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        $msg = '';
        //var_dump($items);
        return view('goal.sixth_day', compact('item','msg'));     
    }
    
    public function seventh_day(Request $request)
    {
        $item = Goal::where('id',$request->id)->first();
        $msg = '';
        //var_dump($items);
        return view('goal.seventh_day', compact('item','msg'));     
    }
    
    
}
