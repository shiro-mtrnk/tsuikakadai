

<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>アカウント登録確認画面</title>
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
            <h3>アカウント登録確認画面</h3>
            <div class="nyuuryoku">
                <ul>
                    <li>
                        <?php 
                            $limit_name = 10;
                            $limit_mail = 100;
                            $limit_postal_code = 7;
                            $family_name_length = mb_strlen($_POST['family_name']);
                            $last_name_length = mb_strlen($_POST['last_name']);
                            $family_name_kana_length = mb_strlen($_POST['family_name_kana']);
                            $last_name_kana_length = mb_strlen($_POST['last_name_kana']);
                            $mail_length = mb_strlen($_POST['mail']);
                            $password_length = mb_strlen($_POST['password']);
                            $postal_code_length = mb_strlen($_POST['postal_code']);
                            $address_1_length = mb_strlen($_POST['address_1']);
                            $address_2_length = mb_strlen($_POST['address_2']);
                        ?>
                        
                        <div class="koumoku"><label>名前（姓）</label>
                            <?php if(empty($_POST['family_name'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $family_name_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['family_name']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    
                    <li>
                        <div class="koumoku"><label>名前（名）</label>
                            <?php if(empty($_POST['last_name'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $last_name_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>                        
                            <?php }else{; ?>
                                <?php echo $_POST['last_name']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>カナ（姓）</label>
                            <?php if(empty($_POST['family_name_kana'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $family_name_kana_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>                        
                            <?php }else{; ?>
                                <?php echo $_POST['family_name_kana']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>カナ（名）</label>
                            <?php if(empty($_POST['last_name_kana'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $last_name_kana_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['last_name_kana']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>  
                    
                    <li>
                        <div class="koumoku"><label>メールアドレス</label>
                            <?php if(empty($_POST['mail'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_mail < $mail_length){; ?>
                                <div class="mae"><?php echo "入力文字数は100文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['mail']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>パスワード</label>
                            <?php if(empty($_POST['password'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $password_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>                          
                            <?php }else{; ?>
                                <?php 
                                    if(isset($_POST['password'])){
                                        for($i=0;$i<$password_length;$i++){
                                            echo "●";
                                        }
                                    }
                                ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>性別</label>
                            <?php
                            if($_POST['gender'] == 0){
                                echo "男";
                            }else{
                                echo "女";
                            }

                            ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>郵便番号</label>
                            <?php if(empty($_POST['postal_code'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_postal_code < $postal_code_length){; ?>
                                <div class="mae"><?php echo "入力文字数は7文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['postal_code']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>住所（都道府県）</label>
                            <?php if(empty($_POST['prefecture'])){; ?>
                                <div class="mae"><?php echo "前に戻って選択してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['prefecture']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>    
                    
                    <li>
                        <div class="koumoku"><label>住所（市区町村）</label>
                            <?php if(empty($_POST['address_1'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_name < $address_1_length){; ?>
                                <div class="mae"><?php echo "入力文字数は10文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['address_1']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>住所（番地）</label>
                            <?php if(empty($_POST['address_2'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }elseif($limit_mail < $address_2_length){; ?>
                                <div class="mae"><?php echo "入力文字数は100文字までです"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['address_2']; ?>
                            <?php }; ?>
                        </div>
                    </li><br>
                    
                    <li>
                        <div class="koumoku"><label>アカウント権限</label>
                            <?php 

                            if($_POST['authority'] == 0){
                                echo "一般";
                            }else{
                                echo "管理者";
                            }

                            ?>
                        </div>
                    </li><br>
                </ul>    
                 
                <div class="button_ichi">
                    <form action="regist.php"  method="post" class="buton_2pL">
                        <input class="button" type="submit" value="前に戻る">
                        <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
                        <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
                        <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
                        <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                        <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
                        <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
                        <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                        <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                        <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                        <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
                    </form>
                    
                    <form action="regist_complete.php" method="post" class="button_2pR" >
                        <?php
                            if(empty($_POST['family_name']) or 
                                empty($_POST['last_name']) or 
                                empty($_POST['family_name_kana']) or 
                                empty($_POST['last_name_kana']) or 
                                empty($_POST['mail']) or 
                                empty($_POST['password']) or 
                                empty($_POST['postal_code']) or 
                                empty($_POST['prefecture']) or 
                                empty($_POST['address_1']) or 
                                empty($_POST['address_2'])){
                                    echo '';
                            }elseif($limit_name < $family_name_length or 
                                    $limit_name < $last_name_length or 
                                    $limit_name < $family_name_kana_length or 
                                    $limit_name < $last_name_kana_length or 
                                    $limit_mail < $mail_length or 
                                    $limit_name < $password_length or 
                                    $limit_postal_code < $postal_code_length or 
                                    $limit_name < $address_1_length or 
                                    $limit_name < $address_2_length){
                                echo '';
                            }else{
                                echo '<input class="button" value="登録する" type="submit">';
                            }
                        ?>
                        <input type="hidden" value="<?php echo $_POST['family_name']; ?>" name="family_name">
                        <input type="hidden" value="<?php echo $_POST['last_name']; ?>" name="last_name">
                        <input type="hidden" value="<?php echo $_POST['family_name_kana']; ?>" name="family_name_kana">
                        <input type="hidden" value="<?php echo $_POST['last_name_kana']; ?>" name="last_name_kana">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                        <input type="hidden" value="<?php echo $_POST['gender']; ?>" name="gender">
                        <input type="hidden" value="<?php echo $_POST['postal_code']; ?>" name="postal_code">
                        <input type="hidden" value="<?php echo $_POST['prefecture']; ?>" name="prefecture">
                        <input type="hidden" value="<?php echo $_POST['address_1']; ?>" name="address_1">
                        <input type="hidden" value="<?php echo $_POST['address_2']; ?>" name="address_2">
                        <input type="hidden" value="<?php echo $_POST['authority']; ?>" name="authority">
                    </form>
                    
                </div>
            </div>
        </main>
        
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
        
    </body>
    
</html>