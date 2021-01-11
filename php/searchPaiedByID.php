<!--透過表單編號查詢租借單狀態-->
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>查詢租借狀態</title>
	</head>
</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<!-- 網頁小標，該網頁之功能 -->
		<div class="title">
			<h1>查詢租借狀態</h1>
        	</div>
		<div class="content">
			<div class="content1">
			<form method="GET" action="">
			<h1>請輸入欲查詢狀態之租借單編號</h1><br>
			<h1><label for="">表單編號：</label>
			<input type="text" name="number">
			<input type="submit" value="確定">
			</form></h1>

<?php
	$num=$_GET["number"];
	if($num){
		//連接到資料庫
		include("connect.php");
	
		//選擇rentsystem資料庫
		$select_db=@mysql_select_db("rentsystem");
		if(!$select_db)
		{
			echo '<br>找不到資料庫!<br>';
		}
		else
		{
			$sql="SELECT Receipt_Status FROM receipt WHERE Receipt_no ='".$num."' ";
			$result=mysql_query($sql);
			$row=mysql_fetch_row($result);
			echo "<h2><font color=red><p>".$row[0]."</p></font></h2>";
		}
	}
?>
		<br>
		<form method=get action='payStatus.php'>
            <p align="center">
            <input value="回到查詢首頁" type="submit">
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