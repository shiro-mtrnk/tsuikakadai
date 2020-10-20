
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント削除確認画面</title>
        <link rel="stylesheet" type="text/css" href="regist.css">
        <?php
            mb_internal_encoding("utf8");
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
            <h3>アカウント削除確認画面</h3>
            <?php
                $id = $_POST['id'];
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
                    $stmt = $pdo->query("select * from kadai1 where id = $id");
                    echo "本当に削除してよろしいですか？";
                ?>
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
            <?php
            }catch(PDOException $e){ ?>
                <font color="red"><?php echo "エラーが発生したため削除画面に進めません。"."<br>"."恐れ入りますが、ページの再読み込みをお願いします。"."<br>"."<br>"."<br>"."<br>"."<br>";
            }
            ?>  </font>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>