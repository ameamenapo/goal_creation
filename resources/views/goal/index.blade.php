<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Goal creation</title>
    <style>
    body { font-family: "Avenir Next"; }
    header { background-color: #ffc0cb; height: 170px; }
    .main { background-color: #deb887; height: 1000px; }
    .movePage { font-size: 20pt; text-align: leftt; color: white;
        margin: -20px 0px -30px 0px; letter-spacing: -4pt;　}  
    footer { background-color: #ffc0cb; height: 90px; }
    h1 { font-size: 50pt; text-align: left; color: white;
        margin: -20px 0px -30px 0px; letter-spacing: -4pt;　}
    h2 { font-size: 20pt; text-align: leftt; color: white;
        margin: -20px 0px -30px 0px; letter-spacing: -4pt;　}
    p { font-size: 20pt; text-align: leftt; color: white;
        margin: -20px 0px -30px 0px; letter-spacing: -4pt;　}  
    ul { font-size: 12pt;}
    li { list-style: none; }
    .header-list li { float: right; padding: 30px 20px; }
    .header-right {float: right; background-color: rgba(255, 255, 255, 0.3); transition: all 0.5s; }
    .header-right:hover {background-color: rgba(255, 255, 255, 0.5);}
    .header-right a {line-height: 50px; padding-right: 25px; padding-left: 25px; color: white; display: block; }
    </style>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <header>
        <div class="header-logo">
            <h1>誰か目標作ってくれないかな</h1>
            <h2>〜暇を持て余したあなたへ〜</h2>
        </div>
        <div class="header-right">
          <a class="btn" href=" ">ログアウト</a>
        </div>
        <div class="header-list">
            <ul>
                <li>facebook</li>
                <li>twitter</li>
                <li>企業の方</li>
                <li>マイページ</li>
            </ul>
        </div>
        
    </header>
        
        
   <div class=main>
        <h1>目標テーマ一覧</h1>
        <p>今週はどの目標にする？選んでね！</p>
    
        <form action="/goal" method="post">
        <table>
        
         @foreach($items as $item)
        <tr>
            <input type="hidden" name="id" value="{{optional($item)->id}}">
            <input type="hidden" name="theme" value="{{optional($item)->theme}}">{{--この①行はgoalコントローラのtodday_goalアクションのために足した--}}
            <input type="hidden" name="first_day" value="{{optional($item)->first_day}}">
            <input type="hidden" name="second_day" value="{{optional($item)->second_day}}">
            <input type="hidden" name="third_day" value="{{optional($item)->third_day}}">
            <input type="hidden" name="fourth_day" value="{{optional($item)->fourth_day}}">
            <input type="hidden" name="fifth_day" value="{{optional($item)->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{optional($item)->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{optional($item)->seventh_day}}">
    
            <td><a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}">{{optional($item)->theme}}</a></td>
        @endforeach 
        </tr>
        
        </table>
        </form>
        <a class="btn" href="/goal/list">目標を追加する</a>
        <a class="btn" href="/goal/del_list">一覧から目標を削除</a>
        <a class="btn" href="/user">マイページへ</a>
    </div>

        
        
    
    <footer>
        <p>ここはフッター</p>
    </footer>
</body>
</html>