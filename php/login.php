<html>


	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>使用者登入</title>
	</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<!-- 網頁小標，該網頁之功能 -->
		<div class="title">
			<h1>使用者登入</h1>
		</div>

		<div class="content">
			<div class="content1">
			<form method="POST" action="">
			<h1>請輸入帳號密碼<br><br></h1>

			<!--帳號-->
			<h2><label for="usrAcc">帳號：</lable>
			<input type="text" id="usrAcc" name="usrAcc" size="20" maxlength="20">
			<a href="applyACC.php">申請帳號</a><br><br>

			<!--密碼-->
			<label for="usrPswd">密碼：</label>
			<input type="password" id="usrPswd" name="usrPswd" size="20" maxlength="20">
			<a href="resetPSWD.php">忘記密碼</a><br><br>

			<!--確認按鈕-->
			<input type="submit" value="確認">
			</h2></form>

<?php
	include("connect.php");
	//取得login.php傳來的值
	$acc=$_POST["usrAcc"];
	$pswd=$_POST["usrPswd"];
	if(($acc!=NULL)&&($pswd!=NULL)){
		$select_db=@mysql_select_db("rentsystem");
		if(!$select_db) { echo '<br>找不到資料庫!<br>';}
		else{
	
			//找出資料庫中有幾筆符合的
			$query="SELECT * FROM user WHERE Account='".$acc."'AND  Password='".$pswd."' ";
			$result=mysql_query($query);
			$num=mysql_num_rows($result);
			if($num==0){ echo "<h2><font color=red><br><br>帳號/密碼錯誤</h2>"; }
			else{
				//找到登入者的身分類別
				$sql="SELECT Type FROM user WHERE Account='".$acc."' ";
				$type=mysql_query($sql);
				$row=mysql_fetch_array($type);
			
				//跳轉到承辦人員功能選擇頁面
				if($row[0]=="office"){ header("Location:officeHome.php"); exit; }
				else if($row[0]=="admin"){
					header("Location:adminHome.php");
					session_start();
					$_SESSION['personName_login']=$acc;
					exit;
				}	
				else if($row[0]=="student"||$row[0]=="staff"||$row[0]=="others"){//這邊是租借申請人
					//echo "<form method='GET' action=''>";
					//	echo "<input type='hidden' name='acc' value='".$acc."'>";//這樣應該可以傳送登入的申請人帳號
					//echo "</form>";
					session_start();
					$_SESSION['personName_login']=$acc;
					//$getName=$_SESSION['personName'];
    				//echo "name = ".$getName;
					header("Location:personHome.php"); exit;
				}
			}
		
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