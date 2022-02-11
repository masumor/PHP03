<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
  */
require_once('funcs.php');

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM glf_topdb');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .= '<a href="detail.php?id='. $result["id"].'">';
        $view .= $result['indate'] . '：' . $result['glfname'];
        $view .= '</a>';
        //削除よう
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';//追記
        $view .= '  [削除]';//追記
        $view .= '</a>';//追記
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="glfindex.css">
    <title>スコア登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main"><div class="body">
    <!-- Head[Start] -->
    <header><div class="header"><div class="h1">スコア履歴</div></div>
        
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    
    <!-- Main[End] -->
    <a class="btn btn-custom01" href="./index.php">
        <span class="btn-custom01-front">スコア登録</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>

        <a class="btn btn-custom01" href="./top.php">
        <span class="btn-custom01-front">ＴＯＰ</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>  

    </div>
</body>

</html>
