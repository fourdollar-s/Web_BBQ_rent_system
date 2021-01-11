<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>價位查詢</title>
	</head>

<?php
	include("connect.php");
?>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
        		<div class="wrap">
			<h1>場地價格</h1>
        	</div>
<?php

	$select_db=@mysql_select_db("rentsystem");//選擇資料庫
	if(!$select_db)
	{
		echo '<br>找不到資料庫!<br>'; 
	}
	else
	{
		$sql_query="select * from place where Place_no='bbq_001'";
	  	$result=mysql_query($sql_query);

	  	if(mysql_num_rows($result)==1)
	   	{

			 while($row=mysql_fetch_array($result))
		 	{
	  			$bbq_price_in=$row[1];
				$bbq_price_out=$row[2];
	 		}
	   	}

	 	$sql_query="select * from place where Place_no='camp_001'";
	  	$result=mysql_query($sql_query);

	  	if(mysql_num_rows($result)==1)
	   	{

			 while($row=mysql_fetch_array($result))
		 	{
	  			$camp_price_in=$row[1];
				$camp_price_out=$row[2];
	 		}
	   	}
	}


?>
        	<div class="content">
			<div class="content1">
<h1>


<?php
echo'<center>';
echo'<table border=1 width="50%" bgcolor="white">';
echo'<tr bgcolor=AACCEE>';
echo'<th width=30% align="center"valign="center"><font size="5">場地名稱</font></th>';
echo'<th width=30% align="center"valign="center"><font size="5">校內</font></th>';
echo'<th width=30% align="center"valign="center"><font size="5">校外</font></th>';

echo '<tr>';
echo'<th width=50% align="center"valign="center"><font size="5">烤肉台(一爐/每時段)</font></th>';
echo'<th width=30% align="center"valign="center"><font size="4">'.$bbq_price_in.'元</font></th>';
echo'<th width=30% align="center"valign="center"><font size="4">'.$bbq_price_out.'元</font></th>';

echo '<tr>';
echo'<th width=50% align="center"valign="center"><font size="5">露營位(每營位)</font></th>';
echo'<th width=30% align="center"valign="center"><font size="4">'.$camp_price_in.'元</font></th>';
echo'<th width=30% align="center"valign="center"><font size="4">'.$camp_price_out.'元</font></th>';

echo '<tr>';	

?>
</table>
<input value="回到上一頁" type="button" onclick="history.back()">
		</h1>
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