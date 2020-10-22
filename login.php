<!--http://localhost/kadai1/kadai3/login.php-->

<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン画面</title>
        <link rel="stylesheet" type="text/css" href="regist.css">
    </head>
    
    <body>
        
        <header>
            <div class="gazou">
                <img src="../diblog_logo.jpg">
            </div>
            <div class="menu">
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>D.I.Blogについて</li>
                    <li>登録フォーム</li>
                    <li>問い合せ</li>
                    <li>その他</li>
                </ul>
            </div>
        </header>
        
        <main>
            <script type="text/javascript" src="regist.js"></script>
            
            <h3>ログイン画面</h3>
            <form class="login" action="login_di.php" method="post">
            <ul>
                <li>
                    <p><label>メールアドレス</label>
                    <input class="alpha" type="text" name="mail_0" size="20" maxlength="100" required>
                    <span class="alertarea"></span>
                    </p>
                </li>
                
                <li>
                    <p><label>パスワード</label>
                    <input class="eisuu" type="password" name="password_0" size="20" maxlength="10" required>
                    <span class="alertarea"></span>
                    </p>
                </li>
            </ul>
                <br>
                <div class="button_ichi">
                    <input class="button" type="submit" value="ログイン">
                </div>
            </form>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>