<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="content.css">
        <title>場地管理</title>
    </head>

    <body>

        <header>
            <h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
        </header>

        <div class="title">
            <h1>修改場地基本資料</h1>
        </div>

        <div class="content">
            <div class="content1">
    <?php
                echo '<h1>已成功修改資料</h1>';
                echo '<h2>修改後的資料如下</h2>';
                include("connect.php");
                $select_db=@mysql_select_db("rentsystem");//選資料表
                if(!$select_db)
                    echo 'fail';
                else{
                    session_start();
                    $getPlaceNo=$_SESSION['place_no'];
                    $sql_query="select * from place where Place_no='".$getPlaceNo."'";
                    $result=mysql_query($sql_query);
                    
                    echo '<center>';
                    echo '<table border=1 align="center" bgcolor="white">';
                        echo '<tr>';
                        echo '<td align="center" bgcolor=AACCEE width=95><h2>場地編號</h2>';
                        echo '<td align="center" bgcolor=AACCEE width=95><h2>校內價格</h2>';
                        echo '<td align="center" bgcolor=AACCEE width=95><h2>校外價格</h2>';
                        echo '<td align="center" bgcolor=AACCEE width=95><h2>場地類型</h2>';
                        $row=mysql_fetch_array($result);
                        
                        echo '<tr>';
                        echo '<td align="center"><font size="3">'.$row[0];
                        echo '<td align="center"><font size="3">'.$row[1];
                        echo '<td align="center"><font size="3">'.$row[2];
                        echo '<td align="center"><font size="3">'.$row[3];
                    
                    echo '</table>';
            ?>
                    

                    <form method=get action='placeInfoHome.php'>
                    <p align="center">
                    <input value="場地首頁" type="submit">
                    </form>
                    

                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
                    </form>
                <?
                    unset($_SESSION["personName_adminChange"]);
                }
                ?>
                
            </div>    
        </div>
    <footer class="footer">
		<h1>
			© 2015 高雄大學 National University of Kaohsiung<br>
			81148 高雄市楠梓區高雄大學路700號<br>
			700, Kaohsiung University Rd., Nanzih District, Kaohsiung 811, Taiwan, R.O.C.<br>
			高大總機:886-7-5919000 傳真號碼:886-7-5919083<br>
			高大校園緊急聯絡電話:886-7-5917885 高大警衛室:886-7-5919009<br>
		</h1>
	</footer>
    </body>
</html>
