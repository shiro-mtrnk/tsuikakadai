<!--http://localhost/kadai1/kadai3/update.php-->

<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント更新画面</title>
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
            <h3>アカウント更新画面</h3>
            <?php
                $id = $_POST['id'];
                mb_internal_encoding("utf8");
            try{
                $pdo = new PDO("mysql:dbname=tsuikakadai;host=localhost;","root","root");
                $stmt = $pdo->query("select * from kadai1 where id = $id");
            ?>
            <form method="post" action="update_confirm.php" class="nyuuryoku">
                <script type="text/javascript" src="regist.js"></script>
                <?php foreach($stmt as $row){ ?>
                    <ul>
                        <li>
                            <p><label>名前（姓）</label>
                                <input class="hirakan" type="text" name="family_name" size="20" maxlength="10"
                                       value="<?php 
                                                if(isset($_POST['family_name'])){
                                                    echo $_POST['family_name'];
                                                }elseif(isset($row['family_name'])){
                                                    echo $row['family_name'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>    
                            <p><label>名前（名）</label>
                                <input class="hirakan" type="text" name="last_name" size="20" maxlength="10"
                                       value="<?php 
                                                if(isset($_POST['last_name'])){
                                                    echo $_POST['last_name'];
                                                }elseif(isset($row['last_name'])){
                                                    echo $row['last_name'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>
                            <p><label>カナ（姓）</label>
                                <input class="katakana" type="text" name="family_name_kana" size="20" maxlength="10"
                                       value="<?php 
                                                if(isset($_POST['family_name_kana'])){
                                                    echo $_POST['family_name_kana'];
                                                }elseif(isset($row['family_name_kana'])){
                                                    echo $row['family_name_kana'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>
                            <p><label>カナ（名）</label>
                                <input class="katakana" type="text" name="last_name_kana" size="20" maxlength="10"
                                       value="<?php 
                                                if(isset($_POST['last_name_kana'])){
                                                    echo $_POST['last_name_kana'];
                                                }elseif(isset($row['last_name_kana'])){
                                                    echo $row['last_name_kana'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>    
                            <p><label>メールアドレス</label>
                                <input class="alpha" type="text" name="mail" size="20" maxlength="100"
                                       value="<?php 
                                                if(isset($_POST['mail'])){
                                                    echo $_POST['mail'];
                                                }elseif(isset($row['mail'])){
                                                    echo $row['mail'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>    
                            <p><label>パスワード</label>
                                <input class="eisuu" type="text" name="password" size="20" maxlength="10"
                                       placeholder="※更新希望時のみ入力"
                                       value="<?php
                                                if(isset($_POST['password'])){
                                                    echo $_POST['password'];
                                                }elseif(isset($row['password'])){
                                                    echo "";
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>    
                            <p><label>性別</label>
                                <label class="seibetsu"><input type="radio" name="gender" value="0" 
                                                               <?php
                                                                    if(isset($_POST['gender'])){
                                                                        if($_POST['gender'] == 0){
                                                                            echo 'checked';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                    }elseif(isset($row['gender'])){
                                                                        if($row['gender'] == 0){
                                                                            echo 'checked';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                    }
                                             
                                             
                                             
                                             
                                                                ?>
                                                               >男
                                </label>
        <!--                        数字に先に変換して表示されているもののみ男or女にする（逆も可能ではある）-->
                                <label class="seibetsu"><input type="radio" name="gender" value="1"
                                                               <?php
                                                                    if(isset($_POST['gender'])){
                                                                        if($_POST['gender'] == 1){
                                                                            echo 'checked';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                    }elseif(isset($row['gender'])){
                                                                        if($row['gender'] == 1){
                                                                            echo 'checked';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                    }
                                                                ?>
                                                               >女
                                </label>
                            </p><br>
                        </li>    
                            
                        <li>
                            <p><label>郵便番号</label>
                                <input class="suuji" type="text" name="postal_code" size="10" maxlength="7"
                                       value="<?php 
                                                if(isset($_POST['postal_code'])){
                                                    echo $_POST['postal_code'];
                                                }elseif(isset($row['postal_code'])){
                                                    echo $row['postal_code'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>
                        
                        <li>    
                            <p><label>住所（都道府県）</label>
                                <select name="prefecture">
                                    <?php
                                        $japan = array('0'=>'','1'=>'北海道','2'=>'青森県','3'=>'岩手県','4'=>'宮城県',
                                                       '5'=>'秋田県','6'=>'山形県','7'=>'福島県','8'=>'茨城県','9'=>'栃木県',
                                                       '10'=>'群馬県','11'=>'埼玉県','12'=>'千葉県','13'=>'東京都','14'=>'神奈川県',
                                                       '15'=>'新潟県','16'=>'富山県','17'=>'石川県','18'=>'福井県','19'=>'山梨県',
                                                       '20'=>'長野県','21'=>'岐阜県','22'=>'静岡県','23'=>'愛知県','24'=>'三重県',
                                                       '25'=>'滋賀県','26'=>'京都府','27'=>'大阪府','28'=>'兵庫県','29'=>'奈良県',
                                                       '30'=>'和歌山県','31'=>'鳥取県','32'=>'島根県','33'=>'岡山県','34'=>'広島県',
                                                       '35'=>'山口県','36'=>'徳島県','37'=>'香川県','38'=>'愛媛県','39'=>'高知県',
                                                       '40'=>'福岡県','41'=>'佐賀県','42'=>'長崎県','43'=>'熊本県','44'=>'大分県',
                                                       '45'=>'宮崎県','46'=>'鹿児島県','47'=>'沖縄県');
                                                                         
                                        for($i=0;$i<48;$i++){
                                            if(isset($_POST['prefecture'])){
                                                if($japan[$i] == $_POST['prefecture']){
                                                    $org = 'selected';
                                                }else{
                                                    $org = '';
                                                }
                                                echo '<option value="'.$japan[$i].'"'.$org.'>'.$japan[$i].'</option>';
                                            }elseif(isset($row['prefecture'])){
                                                if($japan[$i] == $row['prefecture']){
                                                    $org = 'selected';
                                                }else{
                                                    $org = '';
                                                }
                                                echo '<option value="'.$japan[$i].'"'.$org.'>'.$japan[$i].'</option>';
                                            }else{
                                                echo '<option value="'.$japan[$i].'">'.$japan[$i].'</option>';
                                            }
                                        }
                                        
                                    ?>
                                </select>
                            </p>
                        </li>    
                            
                        <li>
                            <p><label>住所（市区町村）</label>
                                <input class="japanese" type="text" name="address_1" size="20" maxlength="10"
                                       value="<?php 
                                                if(isset($_POST['address_1'])){
                                                    echo $_POST['address_1'];
                                                }elseif(isset($row['address_1'])){
                                                    echo $row['address_1'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li>    
                            
                        <li>
                            <p><label>住所（番地）</label>
                                <input class="japanese" type="text" name="address_2" size="20" maxlength="100"
                                       value="<?php 
                                                if(isset($_POST['address_2'])){
                                                    echo $_POST['address_2'];
                                                }elseif(isset($row['address_2'])){
                                                    echo $row['address_2'];
                                                }
                                              ?>">
                                <span class="alertarea"></span>
                            </p>
                        </li> 
                        
                        <li>
                            <p><label>アカウント権限</label>
                                <select name="authority">
                                    <?php
                                        $kengen = array('0'=>'一般','1'=>'管理者');
                                    
                                        for($a=0;$a<2;$a++){
                                            if(isset($_POST['authority'])){
                                                if($a == $_POST['authority']){
                                                    $arg = 'selected';
                                                }else{
                                                    $arg = '';
                                                }
                                                echo '<option value="'.$a.'"'.$arg.'>'.$kengen[$a].'</option>';
                                            }elseif(isset($row['authority'])){
                                                if($a == $row['authority']){
                                                    $arg = 'selected';
                                                }else{
                                                    $arg = '';
                                                }
                                                echo '<option value="'.$a.'"'.$arg.'>'.$kengen[$a].'</option>';
                                            }else{
                                                echo '<option value="'.$a.'">'.$kengen[$a].'</option>';
                                            }
                                        }                                    
                                    ?>    
                                </select>
                            </p>
                        </li>
                    </ul>
                 
                    <div class="button_ichi">
                        <input class="button" type="submit" value="更新する">
                        <input type="hidden" value="<?php echo $_POST['id']; ?>" name="id">
                    </div>
                <?php } ?>
            <?php
            }catch(PDOException $e){ ?>
                <br><br><br><br>
                <div class="complete"><font color="red"><?php echo "エラーが発生したため更新画面に進めません。"."<br>"."恐れ入りますが、ページの再読み込みをお願いします。"."<br>"."<br>"."<br>"."<br>"."<br>";
            }
            ?></font></div>
            </form>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>