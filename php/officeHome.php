<!DOCTYPE html>
<html>


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>使用者登入</title>
	</head>

	<!--連接到mysql-->
	<?php
		include("connect.php");
	?>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<!-- 網頁小標，該網頁之功能 -->
		<div class="title">
			<h1>承辦人員</h1>
		</div>

		<!--選擇要執行的功能-->
		<div class="content">
        	<div class="content1">
				<h1>選擇要前往的功能頁面</h1>

				<center>
				<table border=1 align="center">
				<tr>
				<td align="center">

					<h2><a href="payStatus.php">查詢繳費狀態</a></h2>
					<h2><a href="rentRecord.php">查詢所有租借狀態</a></h2>
					<h2><a href="statusModify.php">修改審核狀態</a></h2>
				</td>
				</tr>
				</table>
				<h2><a href="login.php">返回登入</a></h2>

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
