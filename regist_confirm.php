

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
                        <p><label>名前（姓）</label>
                            <?php if(empty($_POST['family_name'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['family_name']; ?>
                            <?php }; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>名前（名）</label>
                            <?php if(empty($_POST['last_name'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['last_name']; ?>
                            <?php }; ?>
                        </p>
                    </li> 
                    
                    <li>
                        <p><label>カナ（姓）</label>
                            <?php if(empty($_POST['family_name_kana'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['family_name_kana']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>カナ（名）</label>
                            <?php if(empty($_POST['last_name_kana'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['last_name_kana']; ?>
                            <?php }; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>メールアドレス</label>
                            <?php if(empty($_POST['mail'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['mail']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>パスワード</label>
                            <?php if(empty($_POST['password'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['password']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>性別</label>
                            <?php

                            if($_POST['gender'] == 0){
                                echo "男";
                            }else{
                                echo "女";
                            }

                            ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>郵便番号</label>
                            <?php if(empty($_POST['postal_code'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['postal_code']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>住所（都道府県）</label>
                            <?php if(empty($_POST['prefecture'])){; ?>
                                <div class="mae"><?php echo "前に戻って選択してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['prefecture']; ?>
                            <?php }; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>住所（市区町村）</label>
                            <?php if(empty($_POST['address_1'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['address_1']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>住所（番地）</label>
                            <?php if(empty($_POST['address_2'])){; ?>
                                <div class="mae"><?php echo "前に戻って入力してください"; ?></div>
                            <?php }else{; ?>
                                <?php echo $_POST['address_2']; ?>
                            <?php }; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>アカウント権限</label>
                            <?php 

                            if($_POST['authority'] == 0){
                                echo "一般";
                            }else{
                                echo "管理者";
                            }

                            ?>
                        </p>
                    </li>
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