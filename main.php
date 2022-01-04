<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="zoo.css">
    <title>中科大動物園資料網</title>
</head>
<body>
    <div class="all">
        <div class="top">
            <div class="picture">
                <img src="NUTC_logo.gif" style="width: 100%; height: 100%;">
            </div>
            <div class="word">
                <p >回首頁</p>
                <p >問題回報</p>
                <p>園區地圖</p>
                <p>動物百科</p>
                <img src="fb.png" style="margin-left: 10%;">
                <img src="youtube.png" style="margin-left: 20px;">
            </div>

        </div>

        <div class="content">
            <form action="" method="post" >
                <select name="bid" id="bid" title="選擇動物"><option value="">選擇動物</option><option value="黑熊">黑熊</option><option value="山羌">山羌</option><option value="獼猴">獼猴</option><option value="石虎">石虎</option><option value="雲豹">雲豹</option><option value="象龜">象龜</option><option value="吸蜜鸚鵡">吸蜜鸚鵡</option><option value="梅花鹿">梅花鹿</option><option value="水獺">水獺</option></select>
                <input type="submit" value="搜尋" title="搜尋" >
            </form>
        
        <div class="print">
            <?php
                $link=@mysqli_connect('localhost','root','','zoo');
                mysqli_set_charset($link,'utf8');
        
                $sql="SELECT * FROM animal";
                session_start();  
            if (isset($_POST["bid"])) {
        $sql = "SELECT * FROM animal ";
        if (chop($_POST["bid"]) != "" )
            $sql.= "where name LIKE '%".$_POST["bid"]."%' ";
        else
            $sql.= "";
        $sql.= "ORDER BY name";  
        $_SESSION["SQL"] = $sql;

        $result = mysqli_query($link,$sql);
        $total_fields = mysqli_num_fields($result);

        echo"<table border=1><tr>";
        echo"<tr>";
        echo"<td>名稱</td><td>館區</td><td>介紹</td><td>數量</td>";
        echo"</tr>";

        while($rows = mysqli_fetch_array($result,MYSQLI_NUM) ){
            echo"<tr>";
            for($i=0;$i<=$total_fields-1;$i++){
                echo"<td>".$rows[$i]."</td>";
            }  
            echo"</tr>";

        } 
        }
        ?>
    
        </div>
        </div>

        <div class="bottom">
            <div ><p tabindex="0" role="menuitem">
                 中科大動物園 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;誠摯邀請您來參觀&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; &nbsp; <span ><a href="https://www.nutc.edu.tw/bin/home.php" title="政府網站開放資料宣告-「另開新視窗」" target="_blank">政府網站開放資料宣告</a> 、<a href="https://www.nutc.edu.tw/bin/home.php" title="隱私權及網站安全政策-「另開新視窗」" target="_blank">隱私權及網站安全政策</a></span></p>
                <p tabindex="0" role="menuitem">
                    地址：台中市北區三民路三段129號 (<a href="https://www.nutc.edu.tw/files/11-1000-150.php" title="來園交通及位置圖連接-「另開新視窗」" role="button" target="_blank">來園交通及位置圖</a>)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp;<span >傳真：(04)22195011 | 資訊安全及隱私權政策</span>
                </p>
                <p tabindex="0" role="menuitem">
                    服務時間：週一至週日 上午9:00至下午5:00 (農曆除夕休園一天)臺中市民當家熱線 1999(免付費電話服務，公共電話，放心講及第二類電信除外)</p>
                <p tabindex="0" role="menuitem">
            </div>
        </div>
    </div>
   
</body>
</html>