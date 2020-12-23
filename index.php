<!doctype html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width = device-width">
<title>4eachblog 掲示板</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<body>
<header>
    <div class="header-wrapper">
        <div class=img-container>
            <img src="4eachblog_logo.jpg">
        </div>
        <div class="header-list">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</header>
    
<main>
    <div class="main-wrapper">
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
            <form method="post" action="insert.php">
                <h3>入力フォーム</h3>
                <div class="form">
                    <label>ハンドルネーム</label>
                    <input class="input" type="text" size="35" name="handlename" placeholder="名前">
                </div>
                <div class="form">
                    <label>タイトル</label>
                    <input class="input" type="text" size="35" name=title placeholder="スレッドタイトル">
                </div>
                <div class="form">
                    <label>コメント</label>
                    <textarea class="input" rows="15" name="comments" placeholder="ここにコメントを入力してください"></textarea>
                </div>
                <div>
                    <input class="submit" type="submit" value="送信する">
                </div>
            </form>
            <div class="content-wrapper">

<!--
ここではDBに格納された記事のデータを表示させる
そのためにPDOを用いてselect文でデータベースから情報を取得しなければならない
以下でその処理を行う
-->
                <?php
                
                mb_internal_encoding("utf8");
                $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
/*
文字コードを設定し、データベースに接続するための手続き
*/
                
                $stmt = $pdo->query("select * from 4each_keijiban");
/*
PDOでselect文を使うためには$stmt = $pdo->query(SQL文);と記述する
*/
                
                while($row = $stmt->fetch()){
                    echo "<div class='content'>";
                    echo "<h3>".$row['title']."</h3>";
                    echo "<p class='sentence'>".$row['comments']."</p>";
                    echo "<p class='author'>posted by ".$row['handlename']."</p>";
                    echo "</div>";
                }
/*
取得した情報を表示させるためにループ処理を行う
ここではwhile文を使っている（foreach文でも可能）
$rowとは行を意味し、$stmt->fetch()は取得した情報の数を示している
つまり$rowに取得したデータを次々に代入させ、データがなくなるまで次の処理を行うという意味のループ文である
*/

                ?>
            </div>
        </div>
        <div class="right">
            <div class="list">
                <ul>
                    <h3>人気の記事</h3>
                    <li>PHPオススメ本</li>
                    <li>PHP　MyAdminの使い方</li>
                    <li>いま人気のエディタtop5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <ul>
                    <h3>オススメリンク</h3>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <ul>
                    <h3>カテゴリ</h3>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </div>
    </div>
</main>
    
<footer>
    <div class="footer-wrapper">
        <p>copyright © internous | 4each blog the which provides A to Z about programming</p>
    </div>
</footer>
</body> 
</html>