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
            <h1>刪除指定場地</h1>
        </div>

        <div class="content">
            <div class="content1">
                    <h1>請選擇要刪除的場地種類及編號</h1>
                
                <?php
                    include("connect.php");
                    //echo '修改基本資料頁面<br>';
                    $select_db=@mysql_select_db("rentsystem");//選資料表
                    if(!$select_db)
                        echo 'fail';
                    else{
                        //echo 'success<br>';
                        $getName='';
                        
                ?>
                        <form method="get" action="">
                            
                            
                            <center>
                            <table border="1" bgcolor="white">

                            <tr>
                            <td align="center" width=90 bgcolor=AACCEE><h2>場地種類</h2></td>
                            <td align="left">
                            <select name="place1" onchange="window.location='<? echo $PHP_SELF; ?>?place1='+this.value">
                                <option value="">請選擇</option>
                                <option value="露營位" <?if($_GET["place1"]=="露營位"){echo "selected";}?>>露營區</option>
                                <option value="烤肉台" <?if($_GET["place1"]=="烤肉台"){echo "selected";}?>>烤肉區</option>
                            </select>
                            </td>
                            </tr>

                            <tr>
                            <td align="center" width=70 bgcolor=AACCEE><h2>場地編號</h2></td>
                            <td align="left"  width=150>
                            <?php
                                $get=$_GET["place1"];
                                //echo $get."<br>";
                                $sql_query="select * from place where Place_type='".$get."'";
                                $all=mysql_query($sql_query);
                                //echo 'row='.mysql_num_rows($all).'<br>';
                            ?>
                            
                            <?php
                                
                                while($result=mysql_fetch_array($all)){	
                                    $place_no_DB=explode("_",$result['Place_no']);
                            ?>
                                    <input value= "<?echo $result['Place_no']?>" type="checkbox" name="place2[]"><font size="3"><?echo $place_no_DB[1]?></font></option>
                            <?php
                                    
                                }
                            ?>
                            
                            </td>
                            </tr>

                            </table>

                            <p align="center">
                            <input value="送出" type="submit">
                            <input value="清除" type="reset">
                        </form>
                <?
                    }
                    $Place_type=$_GET["place1"];
                    $Place_no=$_GET["place2"];

                    //echo count($Place_no);

                    if($Place_no!=NULL && $Place_type!=NULL){
                        //echo 'no='.$Place_no;
                        for($i=0;$i<count($Place_no);$i++){
                            $sql_query="delete from place where Place_no='".$Place_no[$i]."'";
                            mysql_query($sql_query);
                        }
                        
                        echo '<h2>成功刪除!</h2>'
                ?>
                    <form method=get action='allPlaceInfo.php'>
                        <p align="center">
                        <input value="查詢場地" type="submit">
                    </form>
                    
                <?

                    }

                ?>
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
