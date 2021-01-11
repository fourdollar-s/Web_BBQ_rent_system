
<!--列出所有已繳費的租借單編號-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="content.css">

<title>所有已通過未繳費的租借單</title>
<style>
p{
font-size:15px;
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
	<h1>查詢繳費狀態</h1>
</div>

<div class="content">
	<div class="content1">
		<p>以下為未審核的租借單編號</p>
<?php
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
		//選擇所有已審核但未繳費的申請單
		$sql="SELECT Receipt_no FROM receipt WHERE Receipt_Status ='未審核'";
		$result=mysql_query($sql);
		
		echo "<table border=1px style='width:50%;text-align:center;margin:auto'>";
		echo "<tr>";
		echo "<th>租借單編號</th>";
		echo "</tr>";
		//顯示所有未審核的申請單的編號
		while($row=mysql_fetch_row($result))
		{	
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "</tr>";
		}
		echo "</table>";
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