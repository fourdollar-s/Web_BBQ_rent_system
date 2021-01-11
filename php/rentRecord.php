<!--承辦人員可查看所有租借紀錄-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="content.css">
<title>查詢所有租借紀錄</title>
</head>

<body>
	<header>
		<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
	</header>

	<div class="title">
		<h1>租借紀錄一覽</h1>
	</div>

	<div class="content">
		<div class="content1">

<?php
	include("connect.php");

	//取得資料庫中所有的租借單
	$sql="SELECT * FROM receipt";
	$result=mysql_query($sql);

	echo "<h1>以下為所有的租借單編號<br></h1>";
			
			echo "<center>";	
			echo "<table border=1 width=70%>";
			echo '<tr width=20% bgcolor=AACCEE align="center">';
			echo '<td><h2>表單編號';
			echo '<td><h2>申請人帳號';
			echo '<td><h2>該次申請的場地類型';
			echo '<td><h2>租借的場地數量';
			echo '<td><h2>申請人地址';
			echo '<td><h2>活動人數';
			echo '<td><h2>租借申請狀態';
			echo '<td><h2>統一編號';
			echo '<td><h2>稅籍編號';
			echo '<td><h2>租借起始日期與時間';
			echo '<td><h2>租借結束日期與時間';
			echo '<td><h2>申請日期';
		
		while($row=mysql_fetch_array($result)){
			
				echo '<tr bgcolor="#FFFFFF" align="center">';
				echo '<td><font size="3">'.$row[0];
				echo '<td><font size="3">'.$row[1];
				echo '<td><font size="3">'.$row[2];
				echo '<td><font size="3">'.$row[3];
				echo '<td><font size="3">'.$row[4];
				echo '<td><font size="3">'.$row[5];
				echo '<td><font size="3">'.$row[6];
				echo '<td><font size="3">'.$row[7];
				echo '<td><font size="3">'.$row[8];
				echo '<td><font size="3">'.$row[9];
				echo '<td><font size="3">'.$row[10];
				echo '<td><font size="3">'.$row[11];
			
		
		}

?>
        </table>
        <form method=get action='officeHome.php'>
        <p align="center">
	    <input value="承辦人員首頁" type="submit">
        </form>
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