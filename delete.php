<!--http://localhost/kadai1/kansei/delete.php-->

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
            <h3>アカウント削除確認画面</h3>
            <?php
                $id = $_POST['id'];
                mb_internal_encoding("utf8");
            try{
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                    $stmt = $pdo->query("select * from kadai1 where id = $id");
                    ?>
            <div class="nyuuryoku">
                <?php foreach($stmt as $row){ ?>
                    <ul>    
                        <li>
                            <div class="koumoku"><label>名前（姓）</label>
                                <?php echo $row['family_name']."<br>"; ?>
                            </div>
                        </li><br>    
                        
                        
                        <li>
                            <div class="koumoku"><label>名前（名）</label>
                                <?php echo $row['last_name']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>カナ（姓）</label>
                                <?php echo $row['family_name_kana']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>カナ（名）</label>
                                <?php echo $row['last_name_kana']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>メールアドレス</label>
                                <?php echo $row['mail']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>パスワード</label>                        
                            <?php 
                                if(isset($row['password'])){
                                    echo "●●●●●●●●●●";
                                }
                            ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>性別</label>
                            <?php if($row['gender'] == 0){ ?>
                                        <?php echo "男"; ?>
                                    <?php }else{ ?>
                                        <?php echo "女" ?>
                                    <?php } ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>郵便番号</label>
                                <?php echo $row['postal_code']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>住所（都道府県）</label>
                                <?php echo $row['prefecture']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>住所（市区町村）</label>
                                <?php echo $row['address_1']."<br>"; ?>
                            </div>
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>住所（番地）</label>
                                <?php echo $row['address_2']."<br>"; ?>
                            </div>    
                        </li><br>
                        
                        
                        <li>
                            <div class="koumoku"><label>アカウント権限</label>
                                <?php if($row['authority'] == 0){ ?>
                                    <?php echo "一般"; ?>
                                <?php }else{ ?>
                                    <?php echo "管理者"; ?>
                                <?php } ?>
                            </div>
                        </li><br>
                    </ul>
                <?php } ?>
               
                <form class="button_ichi" action="delete_confirm.php" method="post">
                    <input class="button" type="submit" value="削除する">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                </form>
            <?php    
            }catch(PDOException $e){ ?>
                <br><br><br><br>
                <div class="complete"><font color="red"><?php echo "エラーが発生したため削除画面に進めません。"."<br>"."恐れ入りますが、ページの再読み込みをお願いします。"."<br>"."<br>"."<br>"."<br>"."<br>";
            }
            ?>      </font></div>
            
            </div>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
        
    </body>
    
</html>