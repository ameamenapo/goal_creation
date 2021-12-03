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
    .btn { padding: 8px 24px; color: white; display: inline-block; opacity: 0.8; }
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
          <a class="login" href=" ">ログアウト</a>
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
        <h1>目標を編集する</h1>
        <p>{{$msg}}</p>
        <form action="/goal/edit" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$item->id}}">
         {{--<tr><td><a href="{{ route('goal.edit') }}?id={{optional($item)->id}}">{{optional($item)->theme}}</a></td></tr>--}}
        <tr><th>テーマ: </th><td><input type="text" name="theme" value="{{optional($item)->theme}}"></td></tr>{{--goal/list2からのリンク付きで飛ばした時にこれつけるとテーマも編集できるようになる。--}}
        <tr><th>1日目: </th><td><input type="text" name="first_day" value="{{optional($item)->first_day}}"></td></tr>
        <tr><th>2日目: </th><td><input type="text" name="second_day" value="{{optional($item)->second_day}}"></td></tr>
        <tr><th>3日目: </th><td><input type="text" name="third_day" value="{{optional($item)->third_day}}"></td></tr>
        <tr><th>4日目: </th><td><input type="text" name="fourth_day" value="{{optional($item)->fourth_day}}"></td></tr>
        <tr><th>5日目: </th><td><input type="text" name="fifth_day" value="{{optional($item)->fifth_day}}"></td></tr>
        <tr><th>6日目: </th><td><input type="text" name="sixth_day" value="{{optional($item)->sixth_day}}"></td></tr>
        <tr><th>7日目: </th><td><input type="text" name="seventh_day" value="{{optional($item)->seventh_day}}"></td></tr>
        <tr><th></th><td><input type="submit" value="目標を修正"></td></tr>
    </table>    

        <div class="btn-wrapper">
            <a href="/goal/add" class="btn signup">目標を作成</a>
            <a href="/goal" class="btn facebook">目標一覧へ</a>
        </div>
    </div>
      
    
        
        
    
    <footer>
        <p>ここはフッター</p>
    </footer>
</body>
</html>




