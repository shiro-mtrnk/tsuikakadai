
<?php

mb_internal_encoding("utf8");

date_default_timezone_set('Asia/Tokyo');

?>



<!doctype html>

<html lang="ja">
     <head>
        <meta charset="utf-8">
        <title>アカウント登録完了画面</title>
        <link rel="stylesheet" type="text/css" href="regist.css">  
        <?php 
            mb_mb_internal_encoding("utf8");
            session_start();
        ?>
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
                    <?php 
                        if(isset($_SESSION['authority_0'])){
                            if($_SESSION['authority_0'] == 1){ ?>
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
                    <?php }else{
                            }
                        }
                    ?>
                </ul>
            </div>
        </header>
        
        <main>
            <h3>アカウント登録完了画面</h3>
            <div class="complete">
                <br>
                <br>
                <br>
                <br>
                <?php
                try{   
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");

//                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//                    $pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

                    $pdo->exec("insert into kadai1(family_name,last_name,family_name_kana,last_name_kana,mail,password,gender,postal_code,prefecture,address_1,address_2,authority,delete_flag,registered_time,update_time)values('".$_POST['family_name']."','".$_POST['last_name']."','".$_POST['family_name_kana']."','".$_POST['last_name_kana']."','".$_POST['mail']."','".password_hash($_POST['password'],PASSWORD_DEFAULT)."','".$_POST['gender']."','".$_POST['postal_code']."','".$_POST['prefecture']."','".$_POST['address_1']."','".$_POST['address_2']."','".$_POST['authority']."',0,'".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."');");
                    echo "登録完了しました。";
                }catch(PDOException $e){
                    echo "エラーが発生したため、アカウント登録できません。"."<br>"."恐れ入りますが初めから入力をお願いします。";
                }
//                echo "登録完了しました。";
                
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