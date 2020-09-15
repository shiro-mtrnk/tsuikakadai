<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除確認画面</title>
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
            <h3>アカウント削除確認画面</h3>
            <?php
                $id = $_POST['id'];
                mb_internal_encoding("utf8");
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                $stmt = $pdo->query("select * from kadai1 where id = $id");
            ?>
            
            <div class="complete">
                <br>
                <br>
                <br>
                <br>
                本当に削除してよろしいですか？
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            
            <div class="button_ichi">
                <form action="delete.php"  method="post" class="button_2pL">
                    <input class="button" type="submit" value="前に戻る">
                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                </form>
                
                <form action="delete_complete.php" method="post" class="button_2pR">
                    <input class="button" type="submit" value="削除する">
                    <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                </form>
                
                
            </div>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>