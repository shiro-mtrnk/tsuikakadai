<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除完了画面</title>
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
            <h3>アカウント削除完了画面</h3>
            <?php
                $id = $_POST['id'];
                mb_internal_encoding("utf8");
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                $pdo->exec("update kadai1 set delete_flag = 1 where id = $id");
            ?>
            
            <div class="complete">
                <br>
                <br>
                <br>
                <br>
                削除完了しました
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            
            <form action="list_tameshi.php" class="button_ichi">
                <input class="button" type="submit" value="TOPページへ戻る">
            </form>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>