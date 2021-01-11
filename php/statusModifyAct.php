<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="content.css">
<title>Change Status</title>
<style>
p{
font-size:20px;
}
label{
font-size:15px;
}
</style>
</head>
<body>

<header>
	<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
</header>

<div class="title">
	<h1>核准狀態修改</h1>
</div>

<div class="content">
<div class="content1">
<?php
	include("connect.php");

	$number=$_GET["no"];
	$status=$_GET["Pay"];
	
	$sql="UPDATE receipt SET Receipt_Status='".$status."' WHERE Receipt_no='".$number."' ";
	mysql_query($sql);
	
	echo "<p>已完成修改，可前往<a href='payStatus.php'>狀態查詢頁面</a>確認</p>";
?>

		<br>
		<h2><a href="statusModify.php">返回修改</a></h2>
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
