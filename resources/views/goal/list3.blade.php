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
    {{--<link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="css/styles.css"> {{--ここはオリジナルのCSS読み込んでいる。でもあんま効力なさない？--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{--ここはbootstrap読み込んでいる--}}    
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
        <h1>目標を選ぶ</h1>
        <p>他のユーザーが作成した目標</p>
        <form action="/goal/list3" method="post"> 
        <table>
        @csrf
        @if(isset($items)) 
            @if($items->isEmpty())
                <p>目標が登録されていないので、選べません。他の人の目標から選ぶか、自分で目標を作成しましょう！</p>
            @else
                <p>目標を選んでください。</p>    
            @endif
        @else
            <p>{{$msg}}</p>
        @endif
        <tr>目標テーマ一覧</tr>
        @foreach($items as $item)
        <tr>
            <label style="display:block;">
                <input type="radio"  name="theme" value="{{$item->id}}" required>{{$item->theme}}
            </label>
        </tr>
        @endforeach
        <tr><th></th><td><input type="submit" value="目標一覧へ追加"></td></tr>
        </table>
        {{ $items->links() }}
        {{--{{ $items->links('pagination::bootstrap-4') }}ちゃんとAppServiceProviderにbootstrap読み込んでれば上記のコーーどでOK--}}
        </form>
        <a href="/goal/list" class="btn">他の目標を見る</a>
        <a href="/goal" class="btn">目標一覧へ</a>
    </div>
   
    
        
    
    <footer>
        <p>ここはフッター</p>
    </footer>
</body>
</html>