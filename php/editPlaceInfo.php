<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="content.css">
        <title>場地管理</title>
    </head>

    <body>
        <header>
            <h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
        </header>

        <div class="title">
            <h1>修改場地基本資料</a></h1>
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
            ?>
                    <form method="POST" action="">
                        <tr>
                        <?
                            
                        $getPlace1=$_GET["place1"];//大類
                        $getPlace2=$_GET["place2"];//幾號
                            
                        $sql_query="select * from place where Place_no='".$getPlace2[0]."'";
                        $result=mysql_query($sql_query);
                                
                        //echo "<p>目前修改的場地為：".$getPlace1."的".$getPlace2[0]."號<br></p>";

                        //中間排版表格
                        echo '<center>';
                        echo '<table border=1 align="center" bgcolor="white">';
                            echo '<tr>';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>場地編號</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>校內價格</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>校外價格</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>場地類型</h2>';
                            $row=mysql_fetch_array($result);
                            
                            echo '<tr>';
                            echo '<td><input type=text size="10" name="Place_no" value="'.$row[0].'">';
                            echo '<td><input type=text size="10" name="Price_in" value="'.$row[1].'">';
                            echo '<td><input type=text size="10" name="Price_out" value="'.$row[2].'">';
                            echo '<td><input type=text size="10" name="Place_type" value="'.$row[3].'">';
                            
                            echo '<input type="hidden" name="place2" value="'.$getPlace2[0].'">';
                        echo '</table>';
                }
                ?>
                
                <p align="center">
                <input value="送出" type="submit">
		</form>

                <form method=get action='placeInfoHome.php'>
                    <p align="center">
                    <input value="場地首頁" type="submit">
                    </form>
                    

                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
                </form>

                <!--接收到修改的資料-->

                <?
                    $Place_no=$_POST["Place_no"];
                    $Price_in=$_POST["Price_in"];
                    $Price_out=$_POST["Price_out"];
                    $Place_type=$_POST["Place_type"];
                    $getPlace2=$_POST["place2"];

		    
                    
                    if($Place_no!=NULL&&$Price_in!=NULL&&$Price_out!=NULL&&$Place_type!=NULL){
                        //echo 'hello';
                        //echo 'place='.$getPlace2;
			$sql_query="update place set Price_in='".$Price_in."',Price_out='".$Price_out."' where Place_type='".$Place_type."'";
			mysql_query($sql_query);

                        $sql_query="update place set Place_no='".$Place_no."',Price_in='".$Price_in."',Price_out='".$Price_out."',Place_type='".$Place_type."' where Place_no ='".$getPlace2."'";
                        mysql_query($sql_query);

			if($Place_no != $getPlace2){
				session_start();
                        	//unset($_SESSION["personName_adminChange"]);
                        	$_SESSION["place_no"]=$Place_no;
		    	}
			else{
                        	session_start();
                        	$_SESSION['place_no']=$getPlace2;
			}
                        header("Location:success_place.php"); exit;
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
