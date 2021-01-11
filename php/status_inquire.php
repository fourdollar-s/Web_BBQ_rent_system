<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>場地狀態查詢</title>
	</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<!-- 網頁小標，該網頁之功能 -->
		<div class="title">
			<h1>場地狀態查詢</h1>
        	</div>

		<?php
			include("connect.php");
			//echo '修改基本資料頁面<br>';
			$select_db=@mysql_select_db("rentsystem");//選資料表
			if(!$select_db)
				echo 'fail';
			else{
		?>
				<div class="content">
					<div class="content1">
					<form method ="get" action="status_display.php">
					<h1>請選擇要查詢的場地</h1>
						<center>
						<table border="1">

						<tr>
							<td align="center" bgcolor=AACCEE><h2>場地種類</td>
							<td align="left">
							<select name="place_type">
								<option value="露營位">露營區</option>
								<option value="烤肉台">烤肉區</option>
							</select>
							</td>
							</tr>
							
						</table>
						<input value="送出" type="submit">
						<input value="回到上一頁" type="button" onclick="history.back()">

						</h2></form>
				</div>

		<?php
			}
		?>

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