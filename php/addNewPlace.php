<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="content.css">
	<title>adminHome</title>
</head>

<body>
    <header>
        <h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
    </header>

    <div class="title">
        <h1>新增場地</h1>
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
                //查詢現在編號編到幾號
                $sql_query="select * from place where Place_type='烤肉台'";
                $result=mysql_query($sql_query);
                $bbq_actual=mysql_num_rows($result);//有幾台
                $i=0;
                while($i!=mysql_num_rows($result)){
                    $row=mysql_fetch_array($result);
                    $i++;
                }
                $bbq_num=$row[0];//編到幾號
                 
                 //查詢現在編號編到幾號
                $sql_query="select * from place where Place_type='露營位'";
                $result=mysql_query($sql_query);
                $camp_actual=mysql_num_rows($result);
                $i=0;
                while($i!=mysql_num_rows($result)){
                    $row=mysql_fetch_array($result);
                    $i++;
                }
                $camp_num=$row[0];
                $check_have_bbq=explode("_",$bbq_num);
                $check_have_camp=explode("_",$camp_num);

                
        ?>
                <form method="post" action="">
            <?
                echo '<center>';
                echo '<table border=1 align="center" bgcolor="white">';
                    echo '<tr>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>場地編號</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>校內價格</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>校外價格</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>場地類型</h2>';
                
                    echo '<tr>';
                    echo '<td><input type=text size="10" name="Place_no" value="">';
                    echo '<td><input type=text size="10" name="Price_in" value="">';
                    echo '<td><input type=text size="10" name="Price_out" value="">';
                    echo '<td><select name="Place_type">';
                        echo '<option value="烤肉台">烤肉台</option>';
                        echo '<option value="露營位">露營位</option>';
                    echo '</select></td>';

                echo '</table>';
            
            }
            ?>

            <p align="center">
            <input value="送出" type="submit">
            </form>

            <form method=get action='allPlaceInfo.php'>
                <p align="center">
                <input value="查詢場地" type="submit">
            </form>

        <?
            if($check_have_bbq[1]>$bbq_actual){
        ?>
                <font color="red"><?echo '<h2>烤肉區有跳號!建議先去查詢</h2>';?></font>
        <?
                //echo $check_have_bbq[1].$bbq_actual;
            }
            if($check_have_camp[1]>$camp_actual){
        ?>
                <font color="red"><?echo '<h2>露營區有跳號!建議先去查詢</h2>';?></font>
        <?
                //echo $check_have_camp[1].$camp_actual;
            }
        ?>
            <!--接收到修改的資料-->
            

            <?
                $Place_no=$_POST["Place_no"];
                $Price_in=$_POST["Price_in"];
                $Price_out=$_POST["Price_out"];
                $Place_type=$_POST["Place_type"];
                //$getPlace2=$_GET["place2"];

                //echo 'type='.$Place_type;

                $search1="bbq_";
                $search2="camp_";
		
		$sql_query="select * from place where Place_type='".$Place_type."'";
		$result=mysql_query($sql_query);
		$row=mysql_fetch_array($result);
		//echo $row[1];

                $check_input=explode("_",$Place_no);
                

                //echo $check_input[1].$check_have_bbq[1].$check_have_camp[1];
                //echo $Place_type;

                if($Place_no!=NULL&&$Price_in!=NULL&&$Price_out!=NULL&&$Place_type!=NULL){
                    $flag=0;
                    if(strstr($Place_no,$search1) && $Place_type =="烤肉台")//檢查編號及type一不一致
                        $flag = 1;//ok
                    else if(strstr($Place_no,$search2) && $Place_type =="露營位")//檢查編號及type一不一致
                        $flag = 1;//ok
                    else
                        $flag = 3;//echo '<br>請依照編號格式輸入!<br>';
                    if($check_have_bbq[1]<$check_input[1] && $Place_type =="烤肉台")//檢查編號是不是大於現有的最後一個
                        $flag = 1;//ok
                    else if($check_have_camp[1]<$check_input[1] && $Place_type =="露營位")//檢查編號是不是大於現有的最後一個
                        $flag = 1;//ok
                    else
                        $flag = 3;//echo '<br>請依照編號格式輸入!<br>';

		    if($Price_in!=$row[1] ||$Price_out!=$row[2])
			$flag = 4;
                    if($Price_in > 0 && $Price_out > 0 && $flag == 1)
                        $flag = 1;//ok
                    else if(($Price_in <= 0 || $Price_out <= 0))
                        $flag = 2;//echo '<br>價格不可小於0!<br>';
                    
                }
                else
                    echo '<h2>欄位不可為空!</h2>';
                
                //echo 'flag='.$flag;
                if($flag == 1){
                    //echo 'place='.$getPlace2;
                    $sql_query="insert into place values ('".$Place_no."','".$Price_in."','".$Price_out."','".$Place_type."')";
                    mysql_query($sql_query);

                    session_start();
                    $_SESSION['place_no']=$Place_no;
                    $flag=0;
                    header("Location:success_place.php"); exit;
                }
                else if($flag == 2)
                    echo '<h2>價格不可小於0!</h2>';
                else if($flag == 3)
                    echo '<h2>編號錯誤，或是場地類型與編號不一致!</h2>';
		else if($flag == 4)
                    echo '<h2>價格跟相同類型之場地價格不一致!</h2>';
                $flag=0;
            ?>
                <center>
                <table border=1 align="center" bgcolor="white">
                <tr>
                <td align="center">
                <?
                    echo '<h2>目前烤肉台編到'.$bbq_num.'號';
                    echo '，共有'.$bbq_actual.'台</h2>';
                    echo '<font size="3">請依照"bbq_***"規則命名編號</font>';
                    
                    echo '<h2>目前露營位編到'.$camp_num.'號';
                    echo '，共有'.$camp_actual.'台</h2>';
                    echo '<font size="3">請依照"camp_***"規則命名編號</font>';
                ?>
                </td>
                </tr>
                </table>

                <form method=get action='placeInfoHome.php'>
                    <p align="center">
                    <input value="場地首頁" type="submit">
                    </form>
                    

                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
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
