<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新完了画面</title>
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
            <h3>アカウント更新完了画面</h3>
            <?php
                $id = $_POST['id'];
                $family_name = $_POST['family_name'];
                $last_name = $_POST['last_name'];
                $family_name_kana = $_POST['family_name_kana'];
                $last_name_kana = $_POST['last_name_kana'];
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                $gender = $_POST['gender'];
                $postal_code = $passwordo['postal_code'];
                $prefecture = $_POST['prefecture'];
                $address_1 = $_POST['address_1'];
                $address_2 = $_POST['address_2'];
                $authority = $_POST['authority'];
                
                
                mb_internal_encoding("utf8");
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                date_default_timezone_set('Asia/Tokyo');
            
                $pdo->exec("update kadai1 set family_name = \"$family_name\" where id = $id");
                $pdo->exec("update kadai1 set last_name = \"$last_name\" where id = $id");
                $pdo->exec("update kadai1 set family_name_kana = \"$family_name_kana\" where id = $id");
                $pdo->exec("update kadai1 set last_name_kana = \"$last_name_kana\" where id = $id");
                $pdo->exec("update kadai1 set mail = \"$mail\" where id = $id");
                $pdo->exec("update kadai1 set password = \"$password\" where id = $id");
                $pdo->exec("update kadai1 set gender = \"$gender\" where id = $id");
                $pdo->exec("update kadai1 set postal_code = \"$postal_code\" where id = $id");
                $pdo->exec("update kadai1 set prefecture = \"$prefecture\" where id = $id");
                $pdo->exec("update kadai1 set address_1 = \"$address_1\" where id = $id");
                $pdo->exec("update kadai1 set address_2 = \"$address_2\" where id = $id");
                $pdo->exec("update kadai1 set autority = \"$authority\" where id = $id");
                $pdo->exec("update kadai1 set update_time = \"date('Y-m-d H:i:s')\" where id = $id");
             
            ?>
            
            <div class="complete">
                <br>
                <br>
                <br>
                <br>
                更新完了しました
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