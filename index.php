<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<title>スコア登録</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="glfindex.css">
    
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body><div class="body">
<header><div class="header"><div class="h1">スコア入力</div></div>
    <!-- <div class="header">
      <div class="topimage">
      <header>
        
    

     method, action, 各inputのnameを確認してください。  -->
    </header>

    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>スコア登録</legend>
                <label>ゴルフ場：<input type="text" name="glfname"></label><br>
                <label>コース（IN/OUT）：<input type="text" name="course"></label><br>
                <label>天気：<input type="text" name='weather'></label><br>
                  
                  
                <label>同伴者：
                <input type="text" name="member" >
                <input type="text" name="member2" >
                <input type="text" name="member3" >
                <input type="text" name="member4" ></label><br>
                <label>HOLE1：<input type="text" name="hole1"></label><br>
                <label>HOLE2：<input type="text" name="hole2"></label><br>
                <label>HOLE3：<input type="text" name="hole3"></label><br>
                <label>HOLE4：<input type="text" name="hole4"></label><br>
                <label>HOLE5：<input type="text" name="hole5"></label><br>
                <label>HOLE6：<input type="text" name="hole6"></label><br>
                <label>HOLE7：<input type="text" name="hole7"></label><br>
                <label>HOLE8：<input type="text" name="hole8"></label><br>
                <label>HOLE9：<input type="text" name="hole9"></label><br>
                <label>HOLE10：<input type="text" name="hole10"></label><br>
                <label>HOLE11：<input type="text" name="hole11"></label><br>
                <label>HOLE12：<input type="text" name="hole12"></label><br>
                <label>HOLE13：<input type="text" name="hole13"></label><br>
                <label>HOLE14：<input type="text" name="hole14"></label><br>
                <label>HOLE15：<input type="text" name="hole15"></label><br>
                <label>HOLE16：<input type="text" name="hole16"></label><br>
                <label>HOLE17：<input type="text" name="hole17"></label><br>
                <label>HOLE18：<input type="text" name="hole18"></label><br>
                
                
    

                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>

    

    <a class="btn btn-custom01" href="./select.php">
        <span class="btn-custom01-front">スコア履歴</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>

        <a class="btn btn-custom01" href="./top.php">
        <span class="btn-custom01-front">ＴＯＰ</span>
        <i class="fas fa-angle-right fa-position-right"></i>
        </a>  


</body>

</html>
