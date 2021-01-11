<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
<?php include "content.css"; ?>
</style>
        <title>場地管理</title>
    </head>

    <body>
        <header>
            <h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
        </header>

        <div class="title">
            <h1>查看所有場地基本資料</h1>
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
            ?>
                <form method="get" action="">
                    <center>
                    <table border="0">
                        <tr>
                        <td align="center" width=80><h2>場地種類</h2></td>
                        <td align="left">
                        <select name="place1" onchange="window.location='<? echo $PHP_SELF; ?>?place1='+this.value">
                            <option value="">請選擇</option>
                            <option value="露營位" <?if($_GET["place1"]=="露營位"){echo "selected";}?>>露營區</option>
                            <option value="烤肉台" <?if($_GET["place1"]=="烤肉台"){echo "selected";}?>>烤肉區</option>
                        </select>
                    </table>
                    </form>
            <?
                    $get_place=$_GET['place1'];
                    //echo 'place='.$get_place;
                    $sql_query="select * from place where Place_type='".$get_place."'";
                    $result=mysql_query($sql_query);
                    $num_max=mysql_num_rows($result);//總共幾筆

                    $limit=10;//一頁顯示幾筆
                    $start=0;//現在顯示到哪
                    //$sql_query="select * from place where Place_type='".$get_place."' order by Place_no limit '".$start."','".$limit."'";
                    //$result=mysql_query($sql_query);
                    //$num=mysql_fetch_array($result);//現在顯示到哪
                    //echo $start;
                        
                    //echo "<p>目前修改的場地為：".$getPlace1."的".$getPlace2."號<br></p>";
                    echo '<table border=1 align="center" bgcolor="white">';
                    echo '<tr>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>場地編號</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>校內價格</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>校外價格</h2>';
                    echo '<td align="center" bgcolor=AACCEE width=95><h2>場地類型</h2>';
                    

                    while($row=mysql_fetch_array($result)){
                        echo '<tr>';
                        echo '<td align="center"><font size="3">'.$row[0].'</td>';
                        echo '<td align="center"><font size="3">'.$row[1].'</td>';
                        echo '<td align="center"><font size="3">'.$row[2].'</td>';
                        echo '<td align="center"><font size="3">'.$row[3].'</td>';    
                    }
                    
                    echo '</table>';

                    
                    
            ?>
                    <!---<form method=get action='addNewPlace.php'>
                    <p align="center">
                    <input value="新增場地" type="submit">
                    </form>

                    <form method=get action='deletePlace.php'>
                    <p align="center">
                    <input value="刪除場地" type="submit">
                    </form>--->

                    <form method=get action='placeInfoHome.php'>
                    <p align="center">
                    <input value="場地首頁" type="submit">
                    </form>
                    

                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
                    </form>
            <?

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
