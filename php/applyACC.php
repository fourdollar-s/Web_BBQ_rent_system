<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="content.css">
<title>申請帳號</title>
<style>
.out{
font-size:25px;
}
label{
font-size:15px;
}
table{
text-align:right;
margin:auto;
}
.hint{
font-size:15px;
margin:auto;
text-align:center;
border:3px #FFAC55 solid;
width:50%;
}
</style>
<body>
<header>
	<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
</header>
<!--文字提示-->
<div class="title">
	<h1>帳號申請</h1>
	
</div>

<div class="content">
<div class="content1">
	<p class="out">請填寫以下所有欄位</p>
	<form method="POST" action="">
	<table> 
		<tr>
		<td><label for="newACC" >帳號：</label></td>
		<td><input id="newACC" name="newACC"><br></td>
		</tr>
		<tr>
		<td><label for="newPSWD" >密碼：</label></td>
		<td><input id="newPSWD" name="newPSWD"><br></td>
		</tr>
		<tr>
		<td><label for="newNAME">姓名：</label></td>
		<td><input id="newNAME" name="newNAME"><br></td>
		</tr>
		<tr>
		<td><label for="newTEL">電話：</label></td>
		<td><input id="newTEL" name="newTEL"><br></td>
		</tr>
		<tr>
		<td><label for="newEMALI">電子信箱：</label></td>
		<td><input id="newEMAIL" name="newEMAIL"><br></td>
		</tr>
		<tr>
		<td><label for="newID">識別碼：</label></td>
		<td><input id="newID" name="newID"><br></td>
		</tr>
		</table>
		<label for="userType">身分類別：</label>
		<select name="userType">
			<!---<option value="admin">管理員</option>
			<option value="office">承辦人員</option>--->
			<option value="student" selected>學生</option>
			<option value="staff">教職人員</option>
			<option value="others">校外人員</option>
		</select><br>
		<div  class="hint">
		<p><b>識別碼</b>欄位請依申請人身分填寫以下要求的值</p>
		<p>若申請人為<b>學生</b>，請在此欄位填入<b>學號</b></p>
		<p>若申請人為<b>教職員</b>，請在此欄位填入<b>教職員編號</b></p>
		<p>若申請人為<b>校外人員</b>，請在此欄位填入<b>身分證字號</b></p>
		</div>
		<input type="submit" value="確認">
	</form>
</div>
</div>

<!--接收上面的資料(原為applyACCAct.php的動作)-->
<?php
	include("connect.php");
	
	//取得applyACC.php傳來的值
	$acc=$_POST["newACC"];
	$pswd=$_POST["newPSWD"];
	$name=$_POST["newNAME"];
	$tel=$_POST["newTEL"];
	$email=$_POST["newEMAIL"];
	$id=$_POST["newID"];
	$type=$_POST["userType"];
	
	//選擇資料庫
	$select_db=@mysql_select_db("rentsystem");
	if(!$select_db) { echo '<br>找不到資料庫!<br>';}
	else{
	
		//找出資料庫中有幾筆符合的
		$query="SELECT * FROM user WHERE Account='".$acc."' ";
		$result=mysql_query($query);
		$num=mysql_num_rows($result);

		if($num!=0){ 
			header("Location:applyFaild.php");//前往帳號申請失敗頁面
			exit;
		}
		else if($acc!=NULL){
			if(($type=="student" OR $type=="staff" OR $type=="others") AND ($id==NULL)){
				header("Location:applyNoIDerr.php");
				exit;
			}
			$sql="INSERT INTO user VALUES('".$acc."','".$pswd."','".$name."','".$tel."','".$email."','".$type."' )";
			mysql_query($sql);
			if($type=="student"){
				$sql="INSERT INTO student (Account,Student_id) VALUES('".$acc."','".$id."')";
				mysql_query($sql);
			}
			else if($type=="staff"){
				$sql="INSERT INTO staff (Account,Staff_id) VALUES('".$acc."','".$id."')";
				mysql_query($sql);
			}
			else if($type=="others"){
				$sql="INSERT INTO others (Account,id) VALUES('".$acc."','".$id."')";
				mysql_query($sql);
			}
			header("Location:applySuccess.php");//前往帳號申請成功頁面
			exit;
		}		
	}
?>

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
