<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除画面</title>
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
                    <input type="hidden" value="<?php echo $row['family_name']; ?>" name="family_name">
                    <input type="hidden" value="<?php echo $row['last_name']; ?>" name="last_name">
                    <input type="hidden" value="<?php echo $row['family_name_kana']; ?>" name="family_name_kana">
                    <input type="hidden" value="<?php echo $row['last_name_kana']; ?>" name="last_name_kana">
                    <input type="hidden" value="<?php echo $row['mail']; ?>" name="mail">
                    <input type="hidden" value="<?php echo $row['password']; ?>" name="password">
                    <input type="hidden" value="<?php echo $row['gender']; ?>" name="gender">
                    <input type="hidden" value="<?php echo $row['postal_code']; ?>" name="postal_code">
                    <input type="hidden" value="<?php echo $row['prefecture']; ?>" name="prefecture">
                    <input type="hidden" value="<?php echo $row['address_1']; ?>" name="address_1">
                    <input type="hidden" value="<?php echo $row['address_2']; ?>" name="address_2">
                    <input type="hidden" value="<?php echo $row['authority']; ?>" name="authority">
                </form>
                
                <form action="delete_complete.php" method="post" class="button_2pR">
                    <input class="button" type="submit" value="削除する">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                </form>
                
                
            </div>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>