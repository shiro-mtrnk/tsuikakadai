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
        }catch(PDOException $e){
            $msg = $e->getMessage();
        }
        
        $sql = "select * from kadai1 where mail = :mail";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':mail',$mail_0);
        $stmt->execute();
        $login = $stmt->fetch();
        if(password_verify($_POST['password_0'],$login['password'])){
            $_SESSION['id'] = $login['id'];
            $_SESSION['authority'] = $login['authority'];
        ?>
        
        <script>
            setTimeout("location.href='diblog.php',0");
        </script>
        
        <?php
        }else{
            $msg = 'メールアドレスまたはパスワードが間違っています。';
            $link = '<a href="login.php">戻る</a>';
        }
        ?>
        
        <?php
        if(password_verify($_POST['password_0'],$login['password'])){
            echo "";
        }else{
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
        <?php } ?>
        <main>            
            <h1>
                <?php 
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo "";
                }
                ?>
            </h1>
            <?php 
                if(isset($link)){
                    echo $link;
                }else{
                    echo "";
                }
            ?>
        </main>
        
        <?php 
        if(password_verify($_POST['password_0'],$login['password'])){
            echo "";
        }else{
        ?>
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming        
        </footer>
        <?php } ?>
    </body>
</html>