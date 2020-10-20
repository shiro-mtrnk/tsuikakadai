<!--http://localhost/kadai1/kadai2/diblog.php-->

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>D.I.BLOG</title>
        <link rel="stylesheet" type="text/css" href="diblog1.css">
        <?php
            mb_internal_encoding("utf8");
            session_start();
        ?>
    </head>

    <body>
        <header>
            <div class="gazou_1">
                <img src="../diblog_logo.jpg">
            </div>
            
            <div class="menu">
                <ul>
                    <li>トップ</li>
                    <li class="kuu">プロフィール</li>
                    <li>D.I.Blogについて</li>
                    <li>登録フォーム</li>
                    <li>問い合せ</li>
                    <li class="kuu">その他</li>
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
        <?php 
            try{
        ?>
            <div class="left">                    
                    <h1>プログラミングに役立つ書籍</h1>
                    <p class="ookisa12">2017年1月15日</p>
                    <p class="gazou_2">
                        <img src="../bookstore.jpg">
                    </p>
                    <div>　D.I.BlogはD.I.Worksが提供する演習課題です。</div>
                    <p>　記事中身</p>
                    <div class="box">
                        <div class="box1">
                            <div class="gazou_3_10">
                                <img src="../pic1.jpg">
                                <p>ドメイン取得方法</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic2.jpg">
                                <p>快適な職場環境</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic3.jpg">
                                <p>Linuxの基礎</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic4.jpg">
                                <p>マーケティング入門</p>
                            </div>
                        </div>
                        <div class="box1">
                            <div class="gazou_3_10">
                                <img src="../pic5.jpg">
                                <p>アクティブラーニング</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic6.jpg">
                                <p>CSSの効率的な勉強方法</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic7.jpg">
                                <p>リータブルコードとは</p>
                            </div>
                            <div class="gazou_3_10">
                                <img src="../pic8.jpg">
                                <p>HTML5の可能性</p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="right">
                <span id="login">
                <?php 
                    if(isset($_SESSION['id_0'])){
                        echo $_SESSION['family_name_0'].$_SESSION['last_name_0']."さんがログイン中です";
                    }else{
                        $msg = "ログインしてください";
                    }
                ?>
                </span>
                <div id="right_1">
                    <h4>人気の記事</h4>
                        <ul>
                            <li>PHPオススメ本</li>
                            <li>PHP　MyAdminの使い方</li>
                            <li>いま人気のエディタTops</li>
                            <li>HTMLの基礎</li>
                        </ul>
                    <h4>オススメリンク</h4>
                        <ul>
                            <li>ディーアイワークス株式会社</li>
                            <li>XAMPPのダウンロード</li>
                            <li>Eclipseのダウンロード</li>
                            <li>Braketsのダウンロード</li>
                        </ul>
                    <h4>カテゴリ</h4>
                        <ul>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>JavaScript</li>
                        </ul>
                </div>
            </div>
        </main>
        <?php
            }catch(PDOException $e){
                if(isset($msg)){
                $msg = $e->getMessage();                    
                }else{
                echo "エラーが発生しました。";                    
                }
            }
        ?>   
        <footer>
            Copyright D.I.worksI D.I. blog is the one which provides A to Z about programming
        </footer>
    </body>
</html>