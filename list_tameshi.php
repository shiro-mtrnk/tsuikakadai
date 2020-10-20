<!--http://localhost/kadai1/kansei/list_tameshi.php-->

<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧画面</title>
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
            <h3>アカウント一覧画面</h3>
            <br>
            <table border="1" cellspacing="0" class="ichiran">
            <?php
            try{
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                    $stmt = $pdo->query("select * from kadai1 order by id desc");
                    
                ?>
                
                <tr>
                    <td>ID</td><td>名前（姓）</td><td>名前（名）</td><td>カナ（姓）</td><td>カナ（名）</td>
                    <td>メールアドレス</td><td>性別</td><td>アカウント権限</td>
                    <td>削除フラグ</td><td>登録日時</td><td>更新日時</td><td colspan="2">操作</td>
                </tr>
                
                    <?php foreach($stmt as $row){ ?>
                        
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['family_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['family_name_kana']; ?></td>
                            <td><?php echo $row['last_name_kana']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td><?php if($row['gender'] == 0){ ?>
                                    <?php echo "男"; ?>
                                <?php }else{ ?>
                                    <?php echo "女";?>
                                <?php } ?>
                            </td>
                            <td><?php if($row['authority'] == 0){ ?>
                                    <?php echo "一般"; ?>
                                <?php }else{ ?>
                                    <?php echo "管理者"; ?>
                                <?php } ?>
                            </td>
                            <td><?php if($row['delete_flag'] == 0){ ?>
                                    <?php echo "有効"; ?>
                                <?php }else{ ?>
                                    <?php echo "無効"; ?>
                                <?php } ?>
                            </td>
                            <td><?php echo substr($row['registered_time'],0,10); ?></td>
                            <td><?php echo substr($row['update_time'],0,10); ?></td>
<!--//                            表示されている年月日の頭に0がつく&「/」で区切られていない-->
                            
                            
                            <td>
                                <form action="update.php" method="post">
                                    <?php if($row['delete_flag'] == 1){; ?>
                                        <?php echo "更新"; ?>
                                    <?php }else{; ?>
                                        <?php echo '<input class="button_list" type=submit value="更新">'; ?>
                                    <?php }; ?>
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                </form>
                            </td>
                            <td>
                                <form action="delete.php" method="post">
                                    <?php if($row['delete_flag'] == 1){; ?>
                                        <?php echo "削除"; ?>
                                    <?php }else{; ?>
                                        <?php echo '<input class="button_list" type=submit value="削除">'; ?>
                                    <?php }; ?>
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name=id>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>  
                <?php 
            }catch(PDOException $e){ ?>
                <br><br><br><br>
                <div class="complete"><font color="red">
                    <?php echo "エラーが発生したため表示できません。"."<br>"."恐れ入りますがページの再読み込みをお願いします。"."<br>"."<br>"."<br>"."<br>"."<br>";
            }
            ?>
                </font></div>
            </table>
            <br>
            
            
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>