<!--http://localhost/kadai1/kadai5/list_tameshi.php-->

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
            
            <form action="list_tameshi.php" method="post" name="kensaku">
                <table border="1" cellspacing="0" id="kensaku" width="100%" class="kensaku_koumoku">
                    <tr>
                        <td width="12%">名前（姓）</td>
                        <td width="38%"><input type="text" name="family_name_k" maxlength="10" size="67%"></td>
                        <td width="12%">名前（名）</td>
                        <td width="38%"><input type="text" name="last_name_k" maxlength="10" size="67%"></td>
                    </tr>
                    
                    <tr>
                        <td>カナ（姓）</td>
                        <td><input type="text" name="family_name_kana_k" maxlength="10" size="67%"></td>
                        <td>カナ（名）</td>
                        <td><input type="text" name="last_name_kana_k" maxlength="10" size="67%"></td>
                    </tr>
                    
                    <tr>
                        <td>メールアドレス</td>
                        <td><input type="text" name="mail_k" maxlength="100" size="67%"></td>
                        <td>性別</td>
                        <td>
                            <input type="radio" name="gender_k" value="2"
                                   <?php
                                        if(isset($_POST["gender_k"])){
                                            if($_POST["gender_k"] == 2){
                                                echo 'checked';
                                            }
                                        }else{
                                            echo 'checked';
                                        }
                                    ?>
                            >　選択なし
                            <input type="radio" name="gender_k" value="0"
                                   <?php 
                                        if(isset($_POST["gender_k"])){
                                            if($_POST["gender_k"] == 0){
                                                echo 'checked';
                                            }
                                        }
                                    ?>   
                            >　男
                            <input type="radio" name="gender_k" value="1"
                                   <?php 
                                        if(isset($_POST["gender_k"])){
                                            if($_POST["gender_k"] == 1){
                                                echo 'checked';
                                            }
                                        }
                                    ?>
                            >　女
                        </td>
                    </tr>
                    
                    <tr>
                        <td>アカウント権限</td>
                        <td>
                            <select name="authority_k">
                                <?php
                                    $kengen = array('0'=>'一般','1'=>'管理者','2'=>'');
                                    
                                    for($i=0;$i<3;$i++){
                                        if(isset($_POST["authority_k"])){
                                            if($kengen[$i] == $_POST["authority_k"]){
                                                $arg = 'selected';
                                            }else{
                                                $arg = '';
                                            }
                                            echo '<option value="'.$kengen[$i].'"'.$arg.'>'.$kengen[$i].'</option>';
                                        }else{
                                            echo '<option value="'.$kengen[$i].'">'.$kengen[$i].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </td><td colspan="2"></td>
                    </tr>
                    
                </table>
                
                <input type="submit" value="検索" id="kensaku_button" background-color="white">
                
            </form>
            
            <br>
            <br>
            
            
            <?php
            try{
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                
                if(isset($_POST["family_name_k"])){
                    $family_name_k = htmlspecialchars($_POST["family_name_k"]);
                }else{
                    $family_name_k = '';
                }
                if(isset($_POST["last_name_k"])){
                    $last_name_k = htmlspecialchars($_POST["last_name_k"]);
                }else{
                    $last_name_k = '';
                }
                if(isset($_POST["family_name_kana_k"])){
                    $family_name_kana_k = htmlspecialchars($_POST["family_name_kana_k"]);
                }else{
                    $family_name_kana_k = '';
                }
                if(isset($_POST["last_name_kana_k"])){
                    $last_name_kana_k = htmlspecialchars($_POST["last_name_kana_k"]);
                }else{
                    $last_name_kana_k = '';
                }
                if(isset($_POST["gender_k"])){
                    $gender_k = htmlspecialchars($_POST["gender_k"]);
                }else{
                    $gender_k = '';                        
                }
                if(isset($_POST["mail_k"])){
                    $mail_k = htmlspecialchars($_POST["mail_k"]);
                }else{
                    $mail_k = '';
                }
                if(isset($_POST["authority_k"])){
                    $authority_k = htmlspecialchars($_POST["authority_k"]);
                }else{
                    $authority_k = '';
                }
//                    ↑次回関数化したい
                
                    
                    $keywords = ["$family_name_k","$last_name_k","$family_name_kana_k","$last_name_kana_k","$gender_k","$mail_k","$authority_k"];
                    
                    $words = ["family_name","last_name","family_name_kana","last_name_kana","gender","mail","authority"];
                    
                    $keywordCondition = [];
                    
                    foreach(array_map(NULL,$words,$keywords) as [$word,$keyword]){
                        $keywordCondition[] = $word.' like "%'.$keyword.'%"';
                    }
                    
//                    var_dump($keywordCondition);
//                    変数の中身の確認用
                    
                    $keywordCondition = implode(' and ',$keywordCondition);
                    
                    
                    
                    
                    
                    
                    $stmt = $pdo->query("select * from kadai1 where '".$keywordCondition."' order by id desc");
//                    $stmt = $pdo->query("select * from kadai1 where family_name like '".$family_name_k."' order by id desc");
                    echo $keywordCondition;
                ?>
                
                
            <table border="1" cellspacing="0" class="ichiran" width="100%">
                
                
                <tr>
                    <td>ID</td><td>名前（姓）</td><td>名前（名）</td><td>カナ（姓）</td><td>カナ（名）</td>
                    <td>メールアドレス</td><td>性別</td><td>アカウント権限</td>
                    <td>削除フラグ</td><td>登録日時</td><td>更新日時</td><td colspan="2">操作</td>
                </tr>
                
                
                <?php 
                    foreach($stmt as $row){ 
                ?>
                
                
                        
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
                <?php }
                
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