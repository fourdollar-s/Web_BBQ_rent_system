<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>查詢歷史紀錄</title>
	</head>



<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>
		

		<div class="title">
        		<div class="wrap">
				<h1>查詢歷史紀錄</h1>
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

        	echo "<h1>目前查詢的帳號為：".$getName."<br></h1>";
		
		echo "<center>";
       		echo '<table border=1 bgcolor=white>';
        	echo '<tr width=20% align="center">';
        	echo '<td bgcolor="#AACCEE"><h2>訂單編號';
        	echo '<td bgcolor="#AACCEE"><h2>申請人帳號';
        	echo '<td bgcolor="#AACCEE"><h2>申請人地址';
        	echo '<td bgcolor="#AACCEE"><h2>活動人數';
        	echo '<td bgcolor="#AACCEE"><h2>統一編號';
        	echo '<td bgcolor="#AACCEE"><h2>稅籍編號';
        	echo '<td bgcolor="#AACCEE"><h2>租借日期';
        	echo '<td bgcolor="#AACCEE"><h2>租借時段';
        	echo '<td bgcolor="#AACCEE"><h2>申請日期';

        	while($row=mysql_fetch_array($result)){
            	echo '<tr>';
            	echo '<td align="center"><font size="3">'.$row[0];
            	echo '<td align="center"><font size="3">'.$row[1];
            	//echo '<td>'.$row[2];
            	//echo '<td>'.$row[3];
            	echo '<td align="center"><font size="3">'.$row[4];
            	echo '<td align="center"><font size="3">'.$row[5];
            	//echo '<td>'.$row[6];
            	if($row[7]==NULL)
            	    echo '<td align="center"><font size="3">-';
            	else
            	    echo '<td align="center"><font size="3">'.$row[7];
            	if($row[8]==NULL)
            	    echo '<td align="center"><font size="3">-';
            	else
            	    echo '<td align="center"><font size="3">'.$row[8];
            	echo '<td align="center"><font size="3">'.$row[9];
            	echo '<td align="center"><font size="3">'.$row[10];
            	echo '<td align="center"><font size="3">'.$row[11];

        	}

        ?>
        </table>
        <form method=get action='personHome.php'>
        <p align="center">
	    <input value="使用者首頁" type="submit">
        </form>
        <?
    }

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
