<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Goal creation</title>
    <style>
    body { font-family: "Avenir Next"; }
    header { background-color: #ffc0cb; height: 170px; }
    .main { background-color: #deb887; height: 1000px; }
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
          <a class="btn" href=" ">ログイン</a>
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
        <h1>今週の目標</h1> 
        <p>{{$msg}}</p>
        <p>テーマ</p>
        <table>
        @csrf
        @foreach($items as $item)
        <tr>
            
            <td>{{optional($item)->theme}}</td>
            {{--<td><input type="hidden" name="theme" value="{{optional($item)->id}}">{{optional($item)->theme}}</td>--}}
             
        </tr>
        @endforeach
        </table>
        
        <p>やること</p>
        <form action="/goal/today_goal" method="post"> 
        @csrf
        <table>
        @foreach($items as $item) {{--property id not objectとかエラー出たから、optional()を足した。また、その一つ手前の作業ではtoday_goalアクションでgetじゃなくfirstで①行目のデータを取得するようにした。--}}
            <tr><td><a href="{{ route('goal.first_day') }}?id={{optional($item)->id}}">{{optional($item)->first_day}}</a></td></tr>
            <tr><td><a href="{{ route('goal.second_day') }}?id={{optional($item)->id}}">{{optional($item)->second_day}}</a></td></tr>
            <tr><td><a href="{{ route('goal.third_day') }}?id={{optional($item)->id}}">{{optional($item)->third_day}}</td></tr>
            <tr><td><a href="{{ route('goal.fourth_day') }}?id={{optional($item)->id}}">{{optional($item)->fourth_day}}</td></tr>
            <tr><td><a href="{{ route('goal.fifth_day') }}?id={{optional($item)->id}}">{{optional($item)->fifth_day}}</td></tr>
            <tr><td><a href="{{ route('goal.sixth_day') }}?id={{optional($item)->id}}">{{optional($item)->sixth_day}}</td></tr>
            <tr><td><a href="{{ route('goal.seventh_day') }}?id={{optional($item)->id}}">{{optional($item)->seventh_day}}</td></tr>
        @endforeach
        </table>
        </form>
            
        <div class="btn-wrapper">
            <a href="/goal" class="btn">目標一覧へ</a>
        </div>  
    </div>
        
        
    
    <footer>
       
    </footer>
</body>
</html>