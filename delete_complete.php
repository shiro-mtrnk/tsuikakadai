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
                    <li>
                        <a href="http://localhost/kadai1/20.10.05/list_tameshi.php">
                            アカウント一覧
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/kadai1/20.10.05/regist.php">
                            アカウント登録
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        
        <main>
            <h3>アカウント削除完了画面</h3>
            <?php
                $id = $_POST['id'];
                $update_time = date('Y-m-d H:i:s');
                mb_internal_encoding("utf8");
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                
                $sql = "update kadai1 set delete_flag = :delete_flag,update_time = :update_time where id = $id";
                $stmt = $pdo->prepare($sql);
                $params = array(':delete_flag' =>1,'update_time' =>$update_time);
                $stmt->execute($params);
                
                
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
            
            <form action="http://localhost/kadai1/20.10.05/diblog.php" class="button_ichi">
                <input class="button" type="submit" value="TOPページへ戻る">
            </form>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>