<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン画面</title>
        <link rel="stylesheet" type="text/css" href="regist.css">
    </head>
    
    <body>
        <?php
        mb_internal_encoding("utf8");
        session_start();
        $mail_0 = $_POST['mail_0'];
        try{
            $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
            $sql = "select * from kadai1 where mail = :mail";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':mail',$mail_0);
            $stmt->execute();
            $login = $stmt->fetch();
            if($login != FALSE and password_verify($_POST['password_0'],$login['password'])){
//        if($row = $stmt->fetch(PDO::FETCH_ASSOC) and password_verify($_POST['password_0'],$login['password'])){
                $_SESSION['id_0'] = $login['id'];
                $_SESSION['authority_0'] = $login['authority'];
                session_destroy();
                ?>
                
                <script>
                    var send_form = document.createElement("form");
                    send_form.name = "login/di";
                    send_form.action = "diblog.php";
                    send_form.method = "POST";
                    send_form.style.visibility = "hidden";
                    document.body.appendChild(send_form);
                    
                    var fld1 = document.createElement("input");
                    fld1.name = "authority_0";
                    fld1.type = "hidden";
                    fld1.value = "<?php $_SESSION['authority_0']; ?>";
                    send_form.appendChild(fld1);
                    
                    send_form.submit();
                    
                    setTimeout("location.href='diblog.php',0");
                </script>
                
                <?php
            }else{
                $msg = 'メールアドレスまたはパスワードが間違っています。';
                $link = '<a href="login.php">戻る</a>';
                ?>
                
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
                    <br><br><br><br><br>
                    <h1>
                        <?php 
                        if(isset($msg)){
                            echo $msg;
                        }else{
                            echo "";
                        }
                        ?>
                    </h1>
                    <br><br><br><br><br>
                    <?php 
                        if(isset($link)){
                            echo $link;
                        }else{
                            echo "";
                        }
                    ?>
                </main>
                
                <footer>
                    Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming        
                </footer>
            <?php 
            }
        }catch(PDOException $e){ 
            $msg = $e->getMessage(); ?>
            <br><br><br><br>
            <div class="complete"><font color=red>
            <?php echo "エラーが発生したためログイン情報を取得できません。"."<br>"."<br>"."<br>"."<br>"."<br>";
        } 
        ?>
            </font></div>
        
    </body>
</html>