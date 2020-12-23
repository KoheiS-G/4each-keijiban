<?php

mb_internal_encoding("utf8");

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");

$pdo->exec("insert into 4each_keijiban(handlename,title,comments)
values('".$_POST['handlename']."', '".$_POST['title']."', '".$_POST['comments']."');");

header("Location:http://localhost/forum/index.php");
/*
header("Location:URLもしくは相対パス");と記述することであるwebページから”自動的”に他のwebページに移動するリダイレクトを行うことができる
リダイレクトにはheader関数を用いる
*/

?>

