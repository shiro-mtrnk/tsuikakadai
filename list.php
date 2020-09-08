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
                    <td>メールアドレス</td><td>パスワード</td><td>性別</td><td>アカウント権限</td>
                    <td>削除フラグ</td><td>登録日時</td><td>更新日時</td><td colspan="2">操作</td>
                </tr>
                
                <?php
                    
                    mb_internal_encoding("utf8");
                    $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                    $stmt = $pdo->query("select * from kadai1 order by id desc");
                        
                    foreach($stmt as $row){
                        
                        echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['family_name']."</td>";
                            echo "<td>".$row['last_name']."</td>";
                            echo "<td>".$row['family_name_kana']."</td>";
                            echo "<td>".$row['last_name_kana']."</td>";
                            echo "<td>".$row['mail']."</td>";
                            echo "<td>".$row['password']."</td>";
                            echo "<td>";
                                if($row['gender'] == 0){
                                    echo "男";
                                }else{
                                    echo "女";
                                }
                            "</td>";
                            echo "<td>";
                                if($row['authority'] == 0){
                                    echo "一般";
                                }else{
                                    echo "管理者";
                                }
                            "</td>";
                            echo "<td>";
                                if($row['delete_flag'] == 0){
                                    echo "有効";
                                }else{
                                    echo "無効";
                                }
                            "</td>";    
                            echo "<td>".substr($row['registered_time'],0,10)."</td>";
                            echo "<td>".substr($row['update_time'],0,10)."</td>";
//                            表示されている年月日の頭に0がつく&「/」で区切られていない
                            echo "<td>".
                                        "<form action='update.php'>".
                                            "<input class='button_list' type=submit value='更新'>".
                                        "</form>".
                                "</td>";
                            echo "<td>".
                                        "<form action='delete.php'>".
                                            "<input class='button_list' type=submit value='削除'>".
                                        "</form>".
                                "</td>";
                        echo "</tr>";
                    }  
                ?>
            </table>
            <br>
            
            
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>