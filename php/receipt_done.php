<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
<?php include "content.css"; ?>
</style>
		<title>申請成功</title>
	</head>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
            <h1>使用者首頁</h1>
			
        	</div>

        	<div class="content">
			<div class="content1">
            

<?php
	include("connect.php");
    //echo '修改基本資料頁面<br>';
    $select_db=@mysql_select_db("rentsystem");//選資料表
    if(!$select_db)
        echo 'fail';
    else{
        //echo 'success<br>';
        //$Id=$_POST["usrId"];
        //echo 'id='.$Id;
        //$name=$_GET["usrName"];
        //$tel=$_GET["tel"];
        $peopleNum=$_POST["peopleNum"];
        $place1=$_POST["place1"];
        $place2=$_POST["place2"];
        $date=$_POST["date"];
        $date_right=explode("\"",$date);
        $time=$_POST["time"];
		$address=$_POST["address"];
        $tax_id=$_POST["tax_id"];
		$tin=$_POST["tin"];
        $time_now=$_POST["time_now"];
        
        //echo 'get='.$peopleNum.','.$place1.','.$place2.','.$date.','.$time.','.$address.','.$tax_id.','.$tin.','.$time_now;
    
        session_start();
		$getId=$_SESSION['personName_login'];
        
		$sql="select * from receipt";//現在幾筆
		$all=mysql_query($sql);
		$order_id=mysql_num_rows($all);
        $order_id+=1;
        $place_no=explode(",",$place2);
        
        //echo 'place='.$place1;
		$sql_query="insert into receipt values('".$order_id."','".$getId."','".$place1."','".count($place_no)."','".$address."','".$peopleNum."','未審核','".$tax_id."','".$tin."','".$date_right[1]."','".$time."','".$time_now."')";
        mysql_query($sql_query);

        
        for($i=0;$i<count($place_no);$i++){
            //echo 'no='.$place_no[$i]."<br>";
            $sql_query="insert into receipt_list values('".$order_id."','".$place_no[$i]."')";
            mysql_query($sql_query);
            //$sql_query="insert into status values('".$place_no[$i]."','".$date_right[1]."','".$time."','a')";
            //mysql_query($sql_query);
            //insert into status values('bbq_001','2021-01-10','10:00~14:00');
        }
        ?>

        <p align="center"><h1>申請成功</p></h1>
        
        <?
        $sql_query="select * from receipt where Receipt_no='".$order_id."'";
        $result1=mysql_query($sql_query);
        //$sql_query="select * from receipt_list where Receipt_no='".$order_id."'";
        //$result2=mysql_query($sql_query);
	
	echo '<center>';
        echo '<table border=1 align="center" bgcolor=white>';
        echo '<tr width=20% bgcolor=AACCEE align="center">';
        echo '<td style="padding:3px;"><h2>表單編號</h2>';
        echo '<td style="padding:3px;"><h2>申請人帳號</h2>';
        echo '<td style="padding:3px;"><h2>場地類型</h2>';
        echo '<td style="padding:3px;"><h2>場地編號</h2>';
        echo '<td style="padding:3px;"><h2>繳費狀態</h2>';
        echo '<td style="padding:3px;"><h2>租借時段</h2>';
        $row=mysql_fetch_array($result1);
        //$row1=mysql_fetch_array($result2);
        echo '<tr align="center">';
		echo '<td style="padding:3px;"><font size="3">'.$row[0];
        echo '<td style="padding:3px;"><font size="3">'.$row[1];
        echo '<td style="padding:3px;"><font size="3">'.$row[2];
        echo '<td style="padding:3px;"><font size="3">'.$place2;
        echo '<td style="padding:3px;"><font size="3">'.$row[6];
        echo '<td style="padding:3px;"><font size="3">'.$row[9]." ".$row[10];
        
        
        echo '</table>';
?>
        <form method=get action='personHome.php'>
            <p align="center">
	        <input value="使用者首頁" type="submit">
        </form>
        
<?

	}
?>
		</div>
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
