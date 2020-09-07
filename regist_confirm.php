

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
                            <?php echo $_POST['family_name']; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>名前（名）</label>
                            <?php echo $_POST['last_name']; ?>
                        </p>
                    </li> 
                    
                    <li>
                        <p><label>カナ（姓）</label>
                            <?php echo $_POST['family_name_kana']; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>カナ（名）</label>
                            <?php echo $_POST['last_name_kana']; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>メールアドレス</label>
                            <?php echo $_POST['mail']; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>パスワード</label>
                            <?php echo $_POST['password']; ?>
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
                            <?php echo $_POST['postal_code']; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>住所（都道府県）</label>
                            <?php echo $_POST['prefecture']; ?>
                        </p>
                    </li>    
                    
                    <li>
                        <p><label>住所（市区町村）</label>
                            <?php echo $_POST['address_1']; ?>
                        </p>
                    </li>
                    
                    <li>
                        <p><label>住所（番地）</label>
                            <?php echo $_POST['address_2']; ?>
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
                    <form action="regist.php" class="buton_2pL">
                        <input class="button" type="submit" value="前に戻る">
                    </form>
                    
                    <form action="regist_complete.php" method="post" class="button_2pR" >
                        <input class="button" type="submit" value="登録する">
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