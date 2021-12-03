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
        <h1>マイページ作成画面</h1>
        <p>{{$msg}}</p>
        
    <form action="/profile/edit" method="post">
    <table>
        @csrf
        {{--<input type="hidden" name="id" value="{{$profile->id}}">--}}
        <tr><th>ニックネーム： </th><td><input type="text" name="nickname"></td></tr>
        <tr><th>年齢: </th><td><input type="text" name="age"></td></tr>
        <tr><th>趣味: </th><td><input type="text" name="hobby"></td></tr>
        <tr><th>ひとこと: </th><td><textarea name="a_word" rows="6" cols="40"></textarea></td></tr>
        {{--<tr><th>プロフィール画像: </th><td><input type="file" name="profile_image"></td></tr>--}}
        
        <tr><th></th><td><input type="submit" value="プロフィールを編集"></td></tr>
    </table>  
    </form>
        <div class="btn-wrapper">
            <a href="/user" class="btn">インデックスへ</a>
        </div>
    </div>
      
    
        
        
    
    <footer>
        <p>ここはフッター</p>
    </footer>
</body>
</html>