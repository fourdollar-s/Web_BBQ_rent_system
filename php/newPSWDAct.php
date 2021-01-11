<html>
<	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>修改結果</title>
	</head>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
			<h1>修改結果</h1>
        	</div>
<!--連接到mysql-->
<?php
	include("connect.php");
?>

  <div class="content">
   <div class="content1">
<?php
	//取得newPSWD.php傳來的值
	$pswd=$_POST["newPSWD"];
	$acc=$_POST["usrAcc"];

	$select_db=@mysql_select_db("rentsystem");
	if(!$select_db) { echo '<br>找不到資料庫!<br>';}
	else{
		$sql="UPDATE user SET Password = '".$pswd."' WHERE Account= '".$acc."' ";
		mysql_query($sql);
		$acc=NULL;
		$pswd=NULL;	
		echo '<font size="5">已成功設定新的密碼<br>將為您導引至登入頁面</font>';
		header("Refresh:3;url=login.php");
	}
?>
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