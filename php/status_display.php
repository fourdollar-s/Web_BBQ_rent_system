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

		<div class="title">
			<h1>查詢結果</h1>
        	</div>

        	<div class="content">
			<div class="content1">
<h1>
<?php
	echo '<center>';
	include("connect.php");
	
	

	$select_db=@mysql_select_db("rentsystem");//選擇資料庫
	if(!$select_db)
	{
		echo '<br>找不到資料庫!<br>'; 
	}
	else
	{
		$type=$_GET["place_type"];

		?>
			<table border=1 align="center" bgcolor="white">
			<tr>
				
				<td align="center" bgcolor=AACCEE width=150><h2>編號</h2>
				<td align="center" bgcolor=AACCEE width=150><h2>日期</h2>
				<td align="center" bgcolor=AACCEE width=150><h2>時段</h2>
			</tr>
		<?

		$sql_query="select Place_no from place where Place_type='".$type."'";//找到所有編號
		$result=mysql_query($sql_query);
		//echo $type;
		$cnt=mysql_num_rows($result);
		//echo $cnt;

		while($row1=mysql_fetch_array($result)){
			//echo $row1[0].'<br>';
			//echo $place2[$i];
			$sql_query1="select * from receipt_list where Place_no='".$row1[0]."'";//去list看它有沒有被借
			$result1=mysql_query($sql_query1);
			$cnt=mysql_num_rows($result1);
			//echo $cnt;

			$flag=0;
			while($row2=mysql_fetch_array($result1)){//如果有
				//echo $row2[0];
				$place_no=$row1[0];
					
				$sql_query2="select * from receipt where Receipt_no='".$row2[0]."'";//去recript看它的時間
				$result2=mysql_query($sql_query2);
				$row3=mysql_fetch_array($result2);
				if($row3>0){//如果有
					echo '<tr>';
					echo '<td align="center"><font size="3">'.$place_no;//date
					echo '<td align="center"><font size="3">'.$row3[9];//date
					echo '<td align="center"><font size="3">'.$row3[10];//time
					$flag=1;
				}
			}
			if($flag == 0){
				
				echo '<tr>';
				echo '<td align="center"><font size="3">'.$row1[0];//date
				echo '<td align="center"><font size="3">'.'-';//date
				echo '<td align="center"><font size="3">'.'-';//time
			}
		}

			
	}	
?>
</table>
<br>
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
