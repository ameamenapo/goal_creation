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
        <h1>今日の目標</h1>
        <p>{{$msg}}</p>
        <p>テーマ</p>
        <table>
        @csrf
       
        <tr>
            
            <td>{{optional($item)->theme}}</td>
             
        </tr>
       
        </table>
        
        <p>４日目：やること</p>
        <form action="/goal/fourth_day" method="post"> 
        @csrf
        <table>
        
        <tr>
            

            <td><input type="hidden" name="todo" value="{{optional($item)->id}}">{{optional($item)->fourth_day}}</td>
           
            
        </tr>
       
        
                {{--<li><a  href="{{action('AchievementController@index') }}">やったよ</a></li>
                <li><a  href=" ">やらなかった</a></li>--}}
            <tr><th></th><td><input type="submit" value="やったよ"></td></tr>
            {{--<tr><th></th><td><input type="submit" value="やらなかった"></td></tr>--}}
        </table>
        </form>
            
        <div class="btn-wrapper">
            <a href="{{ route('goal.today_goal') }}?id={{ optional($item)->id }}" class="btn">今週の目標へ</a>
            <a href="/goal" class="btn">目標一覧へ</a>
        </div>  
    </div>
        
        
    
    <footer>
       
    </footer>
</body>
</html>