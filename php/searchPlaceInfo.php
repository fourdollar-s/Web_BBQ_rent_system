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
            <h1>修改場地基本資料</h1>
        </div>

        <div class="content">
            <div class="content1">
                <h2>請選擇要更改的場地種類及編號</h2>
            
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
                    <form method="get" action="editPlaceInfo.php">
                        <!--製作外面框框--->
                        <center>
                        <table border="0">
                        
                            <tr>
                            <td>
                            <!--中間的排版表格--->
                            <table border="1">

                            <tr>
                                <td align="center" bgcolor=AACCEE><h2>場地種類</td>
                                <td align="left">
                                <select name="place1" onchange="window.location='<? echo $PHP_SELF; ?>?place1='+this.value">
                                    <option value="">請選擇</option>
                                    <option value="露營位" <?if($_GET["place1"]=="露營位"){echo "selected";}?>>露營區</option>
                                    <option value="烤肉台" <?if($_GET["place1"]=="烤肉台"){echo "selected";}?>>烤肉區</option>
                                </select>
                                </td>
                                </tr>
                                <!--租借場地的第二層表單 選編號-->
                                <tr>
                                <td align="center" bgcolor=AACCEE><h2>場地編號</td>
                                <td align="left" width=150 style="padding:3px;">
                                <?php
                                    $get=$_GET["place1"];
                                    //echo $get."<br>";
                                    $sql="SELECT * from place where Place_type = '$get'";
                                    $all=mysql_query($sql);
                                    //echo 'row='.mysql_num_rows($result).'<br>';
                                ?>

                                <?php
                                    
                                    while($result=mysql_fetch_array($all)){	
                                        $place_no_DB=explode("_",$result['Place_no']);
                                ?>
                                        <input value= "<?echo $result['Place_no']?>" type="radio" name="place2[]"><font size="3"><?echo $place_no_DB[1]?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                </td>
                                </tr>
                            </table>

                            </td>
                            </tr>
                        </table>

                        <p align="center">
                        <input value="送出" type="submit">
                        <input value="清除" type="reset">
                    </form>
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
