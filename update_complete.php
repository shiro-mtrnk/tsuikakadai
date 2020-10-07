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
                    <li>
                        <a href="list_tameshi.php">
                            アカウント一覧
                        </a>
                    </li>
                    <li>
                        <a href="regist.php">
                            アカウント登録
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        
        <main>
            <h3>アカウント更新完了画面</h3>
            <?php
                date_default_timezone_set('Asia/Tokyo');
                
                $id = $_POST['id'];
                $family_name = $_POST['family_name'];
                $last_name = $_POST['last_name'];
                $family_name_kana = $_POST['family_name_kana'];
                $last_name_kana = $_POST['last_name_kana'];
                $mail = $_POST['mail'];
                if($_POST['password']){
                    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                }else{
                    '';
                }
                $gender = $_POST['gender'];
                $postal_code = $_POST['postal_code'];
                $prefecture = $_POST['prefecture'];
                $address_1 = $_POST['address_1'];
                $address_2 = $_POST['address_2'];
                $authority = $_POST['authority'];
                $update_time = date('Y-m-d H:i:s');
                
                
                mb_internal_encoding("utf8");
                
            ?>
            
            <div class="complete">
                <br>
                <br>
                <br>
                <br>
                <?php
                    try{
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");

                    if($_POST['password']){
                    $sql = "update kadai1 set family_name = :family_name,last_name = :last_name,family_name_kana = :family_name_kana,last_name_kana = :last_name_kana,mail = :mail,password = :password,gender = :gender,postal_code = :postal_code,prefecture = :prefecture,address_1 = :address_1,address_2 = :address_2,authority = :authority,update_time = :update_time where id = $id";
                    }else{
                    $sql = "update kadai1 set family_name = :family_name,last_name = :last_name,family_name_kana = :family_name_kana,last_name_kana = :last_name_kana,mail = :mail,gender = :gender,postal_code = :postal_code,prefecture = :prefecture,address_1 = :address_1,address_2 = :address_2,authority = :authority,update_time = :update_time where id = $id";  
                    }

                    $stmt = $pdo->prepare($sql);

                    if($_POST['password']){
                    $params = array(':family_name' =>$family_name,':last_name' =>$last_name,':family_name_kana' =>$family_name_kana,':last_name_kana' =>$last_name_kana,':mail' =>$mail,':password' =>$password,':gender' =>$gender,':postal_code' =>$postal_code,':prefecture' =>$prefecture,':address_1' =>$address_1,':address_2' =>$address_2,':authority' =>$authority,'update_time' =>$update_time);
                    $stmt->execute($params);
                    }else{
                    $params = array(':family_name' =>$family_name,':last_name' =>$last_name,':family_name_kana' =>$family_name_kana,':last_name_kana' =>$last_name_kana,':mail' =>$mail,':gender' =>$gender,':postal_code' =>$postal_code,':prefecture' =>$prefecture,':address_1' =>$address_1,':address_2' =>$address_2,':authority' =>$authority,'update_time' =>$update_time);
                    $stmt->execute($params);
                    }
                    echo "更新完了しました";
                    }catch(PDOException $e){
                        echo "エラーが発生したため、アカウントを更新できませんでした";
                    }
                ?>

                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            
            <form action="diblog.php" class="button_ichi">
                <input class="button" type="submit" value="TOPページへ戻る">
            </form>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>