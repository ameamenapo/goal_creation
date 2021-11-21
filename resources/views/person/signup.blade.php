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
    <form action="/person/signup" method="post">    
    <table>
    @csrf    
        <tr><th>名前: </th><td><input type="text" name="name"></td></tr>
        <tr><th>生年月日: </th><td><input type="text" name="birthday"></td></tr>
        <tr><th>メールアドレス: </th><td><input type="text" name="email"></td></tr>
        <tr><th>パスワード: </th><td><input type="text" name="password"></td></tr>
        <tr><th>パスワード（確認）: </th><td><input type="text" name="password_confirmation"></td></tr>
        <tr><th></th><td><input type="submit" value="登録"></td></tr>
    </table>
    </form>

        <div class="btn-wrapper">
            <a href="#" class="btn signup">パスワードをお忘れですか？</a>
            <a href="#" class="btn facebook">新規登録画面へ</a>
        </div>
    </div>
     
    
        
    <footer>
        <p>ここはフッター</p>
    </footer>
</body>
</html>