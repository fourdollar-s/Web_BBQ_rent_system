<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>設定新密碼</title>
	</head>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
			<h1>設定新密碼</h1>
        	</div>

<!--連接到mysql-->
<?php
	include("connect.php");
?>
  <div class="content">
   <div class="content1">

<?php
	//取得resetPSWD.php傳來的值
	$acc=$_POST["oldACC"];
	$name=$_POST["oldNAME"];
	$tel=$_POST["oldTEL"];
	$email=$_POST["oldEMAIL"];

	$select_db=@mysql_select_db("rentsystem");
	if(!$select_db) { echo '<br>找不到資料庫!<br>';}
	else{
	
		//找出資料庫中有幾筆符合的
		$query="SELECT * FROM user WHERE Account='".$acc."'AND Name='".$name."'AND phone='".$tel."'AND email='".$email."' ";
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		
		if($num!=0){
			echo '<h1>設定新密碼</h1><br><br>';
			echo "<h1><form method='post' action='newPSWDAct.php' >";	
   				echo "<label for='newPSWD' style='margin-right:30px;'>新密碼：</label>";
   				echo "<input id='newPSWD' name='newPSWD' type='text'><br>";
				echo "<input type='hidden' name='usrAcc' value='".$acc."'>";
   				echo "<input type='submit' value='確認' style='margin-top:20px;'></form></h1>";
		}
		else{
			echo '<h1>你還沒申請過帳號喔，請先去申請一個</h1><br><br>';

			echo '<h1><a href="login.php">回到登入頁面</a></h1><br>';
			echo '<h1><a href="applyACC.php">前往申請帳號頁面</h1></a>';
		}
	
	
		
		
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