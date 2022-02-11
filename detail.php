<?php

require_once('funcs.php');
// DB接続ができます🤗
$pdo = db_conn();

// id 1番の人だったら、その人が登録したデータ
// だけがほしいので、DBに接続して検索をして表示するため🤗

/**
 * １．PHP
 * [ここでやりたいこと]
 * まず、クエリパラメータの確認 = GETで取得している内容を確認する
 * イメージは、select.phpで取得しているデータを一つだけ取得できるようにする。
 * →select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * ※SQLとデータ取得の箇所を修正します。
 */
//GET送信されたidを取得(URLの後ろについてるデータ)
$id = $_GET["id"];

// SQLを準備する記述を書きます🤗
$stmt = $pdo->prepare('SELECT * FROM glf_topdb WHERE id=:id;');

// sqlが安全かチェックする
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

// sqlを実行
$status = $stmt->execute(); //成功　？　失敗


$view = '';

if ($status === false) {
    sql_error($status); //func.phpに記述しているエラーの共通かを活用しています🤗 sql_error()
} else {
    $result = $stmt->fetch();
}


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="glfindex.css">
    <title>スコア詳細</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body><div class="body">
    <header><div class="header"><div class="h1">スコア編集</div>            </div>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>スコア登録</legend>
                <label>ゴルフ場：<input type="text" name="glfname" value="<?= $result['glfname'] ?>"></label><br>
                <label>コース（IN/OUT）：<input type="text" name="course" value="<?= $result['course']?>"></label><br>
                <label>天気：<input type="text" name="weather" value="<?= $result['weather'] ?>"></label><br>
                <label>同伴者：<input type="text" name="member" value="<?= $result['member'] ?>" >
                <input type="text" name="member2" value="<?= $result['member2'] ?>" >
                <input type="text" name="member3" value="<?= $result['member3'] ?>">
                <input type="text" name="member4" value="<?= $result['member4'] ?>"></label><br>
                <label>HOLE1：<input type="text" name="hole1" value="<?= $result['hole1'] ?>"></label><br>
                <label>HOLE2：<input type="text" name="hole2" value="<?= $result['hole2'] ?>"></label><br>
                <label>HOLE3：<input type="text" name="hole3" value="<?= $result['hole3'] ?>"></label><br>
                <label>HOLE4：<input type="text" name="hole4" value="<?= $result['hole4'] ?>"></label><br>
                <label>HOLE5：<input type="text" name="hole5" value="<?= $result['hole5'] ?>"></label><br>
                <label>HOLE6：<input type="text" name="hole6" value="<?= $result['hole6'] ?>"></label><br>
                <label>HOLE7：<input type="text" name="hole7" value="<?= $result['hole7'] ?>"></label><br>
                <label>HOLE8：<input type="text" name="hole8" value="<?= $result['hole8'] ?>"></label><br>
                <label>HOLE9：<input type="text" name="hole9" value="<?= $result['hole9'] ?>"></label><br>
                <label>HOLE10：<input type="text" name="hole10" value="<?= $result['hole10'] ?>"></label><br>
                <label>HOLE11：<input type="text" name="hole11" value="<?= $result['hole11'] ?>"></label><br>
                <label>HOLE12：<input type="text" name="hole12" value="<?= $result['hole12'] ?>"></label><br>
                <label>HOLE13：<input type="text" name="hole13" value="<?= $result['hole13'] ?>"></label><br>
                <label>HOLE14：<input type="text" name="hole14" value="<?= $result['hole14'] ?>"></label><br>
                <label>HOLE15：<input type="text" name="hole15" value="<?= $result['hole15'] ?>"></label><br>
                <label>HOLE16：<input type="text" name="hole16" value="<?= $result['hole16'] ?>"></label><br>
                <label>HOLE17：<input type="text" name="hole17" value="<?= $result['hole17'] ?>"></label><br>
                <label>HOLE18：<input type="text" name="hole18" value="<?= $result['hole18'] ?>"></label><br>
                <!-- ここに一つ追加します↓ -->
                <input type='hidden' name="id" value="<?=$result["id"]?>">



                <!-- ここに一つ追加します↑ -->
                <input type="submit" value="更新">
            </fieldset></div>
        
    </form>
    

    <a class="btn btn-custom01" href="./select.php">
        <span class="btn-custom01-front">スコア履歴</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>

        <a class="btn btn-custom01" href="./top.php">
        <span class="btn-custom01-front">ＴＯＰ</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>  
</div>
</body>

</html>





