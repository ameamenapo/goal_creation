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
          <a class="login" href=" ">ログイン</a>
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
        <p>テーマ</p>
        <table>
            @csrf
        @foreach($items as $item)
        <tr>
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="hidden" name="first_day" value="{{$item->first_day}}">
            <input type="hidden" name="second_day" value="{{$item->second_day}}">
            <input type="hidden" name="third_day" value="{{$item->third_day}}">
            <input type="hidden" name="fourth_day" value="{{$item->fourth_day}}">
            <input type="hidden" name="fifth_day" value="{{$item->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{$item->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{$item->seventh_day}}">
            <td>{{$item->theme}}</td>
        </tr>
        @endforeach
        </table>
        
        <p>{{$msg}}やること</p>
        <form action="/goal/today_goal" method="post"> 
        @csrf
        <table>
        @foreach($items as $item)
        <tr>
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="hidden" name="theme" value="{{$item->theme}}">
            <input type="hidden" name="second_day" value="{{$item->first_day}}">
            <input type="hidden" name="third_day" value="{{$item->second_day}}">
            <input type="hidden" name="fourth_day" value="{{$item->third_day}}">
            <input type="hidden" name="fifth_day" value="{{$item->fifth_day}}">
            <input type="hidden" name="sixth_day" value="{{$item->sixth_day}}">
            <input type="hidden" name="seventh_day" value="{{$item->seventh_day}}">
           
            <td><input type="hidden" name="first_day" value="{{$item->id}}">{{$item->fourth_day}}</td>
            {{--ここでacievementテーブルのprogressの値によって表示する内容を変えたい。--}}
            
        </tr>
        @endforeach
        
                {{--<li><a  href="{{action('AchievementController@index') }}">やったよ</a></li>
                <li><a  href=" ">やらなかった</a></li>--}}
            <tr><th></th><td><input type="submit" value="やったよ"></td></tr>
            <tr><th></th><td><input type="submit" value="やらなかった"></td></tr>
        </table>
        </form>
            
        <div class="btn-wrapper">
            <a href="/goal" class="btn facebook">目標一覧へ</a>
        </div>  
    </div>
        
        
    
    <footer>
       
    </footer>
</body>
</html>