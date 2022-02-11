<?php
//1. POSTデータ取得
$glfname   = $_POST['glfname'];
$course    = $_POST['course'];
$weather   = $_POST['weather'];
$member    = $_POST['member'];
$member2    = $_POST['member2'];
$member3    = $_POST['member3'];
$member4    = $_POST['member4'];
$hole1    = $_POST['hole1'];
$hole2    = $_POST['hole2'];
$hole3    = $_POST['hole3'];
$hole4    = $_POST['hole4'];
$hole5    = $_POST['hole5'];
$hole6    = $_POST['hole6'];
$hole7    = $_POST['hole7'];
$hole8    = $_POST['hole8'];
$hole9    = $_POST['hole9'];
$hole10    = $_POST['hole10'];
$hole11    = $_POST['hole11'];
$hole12    = $_POST['hole12'];
$hole13    = $_POST['hole13'];
$hole14    = $_POST['hole14'];
$hole15    = $_POST['hole15'];
$hole16    = $_POST['hole16'];
$hole17    = $_POST['hole17'];
$hole18    = $_POST['hole18'];

//2. DB接続します
//*** function化する！  *****************
// 
// function.phpに記述したものを書きますよ
//これが一番最初に書く、呼び出したい時！

require_once('funcs.php');

$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO glf_topdb(glfname,course,weather,member,member2,member3,member4,hole1,hole2,hole3,hole4,hole5,hole6,hole7,hole8,hole9,hole10,hole11,hole12,hole13,hole14,hole15,hole16,hole17,hole18,indate)VALUES(:glfname,:course,:weather,:member, :member2, :member3, :member4, :hole1, :hole2, :hole3, :hole4, :hole5, :hole6, :hole7, :hole8, :hole9, :hole10, :hole11, :hole12, :hole13, :hole14, :hole15, :hole16, :hole17, :hole18,sysdate())");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':glfname', $glfname, PDO::PARAM_STR);
$stmt->bindValue(':course', $course, PDO::PARAM_STR);
$stmt->bindValue(':weather', $weather, PDO::PARAM_STR);
$stmt->bindValue(':member', $member, PDO::PARAM_STR);
$stmt->bindValue(':member2', $member2, PDO::PARAM_STR);
$stmt->bindValue(':member3', $member3, PDO::PARAM_STR);
$stmt->bindValue(':member4', $member4, PDO::PARAM_STR);
$stmt->bindValue(':hole1', $hole1, PDO::PARAM_INT);
$stmt->bindValue(':hole2', $hole2, PDO::PARAM_INT);
$stmt->bindValue(':hole3', $hole3, PDO::PARAM_INT);
$stmt->bindValue(':hole4', $hole4, PDO::PARAM_INT);
$stmt->bindValue(':hole5', $hole5, PDO::PARAM_INT);
$stmt->bindValue(':hole6', $hole6, PDO::PARAM_INT);
$stmt->bindValue(':hole7', $hole7, PDO::PARAM_INT);
$stmt->bindValue(':hole8', $hole8, PDO::PARAM_INT);
$stmt->bindValue(':hole9', $hole9, PDO::PARAM_INT);
$stmt->bindValue(':hole10', $hole10, PDO::PARAM_INT);
$stmt->bindValue(':hole11', $hole11, PDO::PARAM_INT);
$stmt->bindValue(':hole12', $hole12, PDO::PARAM_INT);
$stmt->bindValue(':hole13', $hole13, PDO::PARAM_INT);
$stmt->bindValue(':hole14', $hole14, PDO::PARAM_INT);
$stmt->bindValue(':hole15', $hole15, PDO::PARAM_INT);
$stmt->bindValue(':hole16', $hole16, PDO::PARAM_INT);
$stmt->bindValue(':hole17', $hole17, PDO::PARAM_INT);
$stmt->bindValue(':hole18', $hole18, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
