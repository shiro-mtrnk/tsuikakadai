<!--http://localhost/kadai1/20.09.29/list_tameshi.php-->

<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント一覧画面</title>
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
            <h3>アカウント一覧画面</h3>
            <br>
            <table border="1" cellspacing="0" class="ichiran">
                <tr>
                    <td>ID</td><td>名前（姓）</td><td>名前（名）</td><td>カナ（姓）</td><td>カナ（名）</td>
                    <td>メールアドレス</td><td>性別</td><td>アカウント権限</td>
                    <td>削除フラグ</td><td>登録日時</td><td>更新日時</td><td colspan="2">操作</td>
                </tr>
                
                <?php
                    
                    mb_internal_encoding("utf8");
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                    $stmt = $pdo->query("select * from kadai1 order by id desc");
                    
                    
                ?>
                
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
                                    <input class='button_list' type=submit value='更新'>
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                </form>
                            </td>
                            <td>
                                <form action="delete.php" method="post">
                                    <input class="button_list" type=submit value="削除">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name=id>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>  
            </table>
            <br>
            
            
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>