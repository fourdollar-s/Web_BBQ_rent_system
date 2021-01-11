<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="content.css">
<title>Change Status</title>
</head>
<body>

	<header>
		<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
	</header>

	<!--選擇要執行的功能-->
	<div class="title">
		<h1>核准狀態修改</h1>
	</div>

	<div class="content">
		<div class="content1">
			<h1>請選擇要更改的租借表單編號：</h1>
<?php
	include("connect.php");

	$sql="SELECT Receipt_no FROM receipt";
	$result=mysql_query($sql);
	
	echo "<h2><form method='GET' action='statusModifyAct.php'>";
		echo "<select name='no'>";
		while($row=mysql_fetch_row($result))
		{
			echo "<option value='".$row[0]."'>".$row[0]."</option> ";
		}	
		echo "</select><br><br>";
		echo "<div id='status'>";
			echo "<input type='radio' id='NotPaied' name='Pay' value='未審核'>";
			echo "<label for='NotPaied'>更改為未審核</label>";
			echo "<span>  </span><input type='radio' id='Paied' name='Pay' value='已審核未繳費'>";
			echo "<label for='Paied'>更改為已審核未繳費</label>";
			echo "<span>  </span><input type='radio' id='Paied' name='Pay' value='通過'>";
			echo "<label for='Paied'>更改為通過</label>";
			echo "<br>";
		echo "</div>";
		echo "<br><input class='send' type='submit' value='確認'>";
	echo "</form>";
?>

		<br>
		<form method=get action='officeHome.php'>
            <p align="center">
            <input value="承辦人員首頁" type="submit">
        </form>
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
