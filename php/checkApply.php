<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
<?php include "content.css"; ?>
</style>
		<title>查詢審核狀態</title>
	</head>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
            <h1>審核狀態一覽</h1>
			
        	</div>

        	<div class="content">
			<div class="content1">
            
<?php
	include("connect.php");
    //echo '修改基本資料頁面<br>';
    $select_db=@mysql_select_db("rentsystem");//選資料表
    if(!$select_db)
        echo 'fail';
    else{
        session_start();
        $getName=$_SESSION['personName_login'];

        
        $sql_query="select * from receipt where Account='".$getName."'";
        $result=mysql_query($sql_query);

        echo "<h1><p>目前查詢的帳號為：".$getName."<br></p></h1>";
	
	echo "<center>";
        echo '<table border=1 align="center" bgcolor=white>';
        echo '<tr width=20%  bgcolor=AACCEE align="center">';
        
        echo '<td style="padding:3px;"><h2>訂單編號</h2>';
        echo '<td style="padding:3px;"><h2>申請人帳號</h2>';
        echo '<td style="padding:3px;"><h2>場地類型</h2>';
        echo '<td style="padding:3px;"><h2>場地編號</h2>';
        //echo '<td>申請人地址';
        //echo '<td>活動人數';
        echo '<td style="padding:3px;"><h2>審核狀態</h2>';
        echo '<td style="padding:3px;"><h2>繳費狀態</h2>';
        //echo '<td>統一編號';
        //echo '<td>稅籍編號';
        echo '<td style="padding:3px;"><h2>租借日期</h2>';
        echo '<td style="padding:3px;"><h2>租借時段</h2>';
        echo '<td style="padding:3px;"><h2>申請日期</h2>';
        


        while($row=mysql_fetch_array($result)){
            
            
            echo '<tr align="center">';
            echo '<td style="padding:3px;"><font size="3">'.$row[0];
            
            $sql_query="select * from receipt_list where Receipt_no='".$row[0]."'";
            $result1=mysql_query($sql_query);
            $place_no="";
            $i=0;
            while($row1=mysql_fetch_array($result1)){
                if($i!=0)
                    $place_no = $place_no.",".$row1[1];
                else
                    $place_no = $place_no.$row1[1];
                $i++;
            }
            echo '<td style="padding:3px;"><font size="3">'.$row[1];
            echo '<td style="padding:3px;"><font size="3">'.$row[2];
            echo '<td style="padding:3px;"><font size="3">'.$place_no;
            //echo '<td>'.$row[4];
            //echo '<td>'.$row[5];
            if($row[6]=="未審核"){
                echo '<td style="padding:3px;"><font size="3">未審核';
                echo '<td style="padding:3px;"><font size="3">-';
            }
            else if($row[6]=="通過"){
                echo '<td style="padding:3px;"><font size="3">已審核';
                echo '<td style="padding:3px;"><font size="3">已繳費';
            }
            else{
                echo '<td style="padding:3px;"><font size="3">已審核';
                echo '<td style="padding:3px;"><font size="3">未繳費';
            }
            /*if($row[7]==NULL)
                echo '<td>-';
            else
                echo '<td>'.$row[7];
            if($row[8]==NULL)
                echo '<td>-';
            else
                echo '<td>'.$row[8];
            */
            echo '<td style="padding:3px;"><font size="3">'.$row[9];
            echo '<td style="padding:3px;"><font size="3">'.$row[10];
            echo '<td style="padding:3px;"><font size="3">'.$row[11];
        }

        ?>
        </table>
        <form method=get action='personHome.php'>
        <p align="center">
	    <input value="使用者首頁" type="submit">
        </form>
        <?
    }
	//echo "</h2>";
 ?>
        	</div>
        	</div>
		<!-- 網頁下方的工具列或訊息 -->
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
