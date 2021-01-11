<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="content.css">
        <title>承辦人員修改使用者資料</title>
    </head>

    <body>
        <header>
            <h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
        </header>

            <?php
                
                include("connect.php");
                $select_db=@mysql_select_db("rentsystem");//選資料表
                if(!$select_db)
                    echo 'fail';
                else{
                    session_start();
                    $getName_login=$_SESSION['personName_login'];
                    //echo 'name='.$getName_login;
                    $sql_query="select * from user where Account='".$getName_login."'";
                    $result=mysql_query($sql_query);
                    $row=mysql_fetch_array($result);

                    if($row[5]=="admin"){//如果目前登入的帳號是admin
                        ?>
                        <div class="title">
                            <h1>修改基本資料</h1>
                            
                        </div>
                        <div class="content">
                        <div class="content1">

                        <?
                        echo '<h1>已成功修改資料</h1>';
                        echo '<h2>修改後的資料如下</h2>';
                        $getName=$_SESSION["personName_adminChange"];
                        //echo $getName;
                        $sql_query="select * from user where Account='".$getName."'";
                        $result=mysql_query($sql_query);
                        $row=mysql_fetch_array($result);
                        
                        if($row[5]=="student"){
                            $sql_query1="select * from student where Account='".$getName."'";
                            $result1=mysql_query($sql_query1);
                            $row1=mysql_fetch_array($result1);
                        }
                        else if($row[5]=="staff"){
                            $sql_query2="select * from staff where Account='".$getName."'";
                            $result2=mysql_query($sql_query2);
                            $row1=mysql_fetch_array($result2);
                        }
                        else if($row[5]=="others"){
                            $sql_query3="select * from others where Account='".$getName."'";
                            $result3=mysql_query($sql_query3);
                            $row1=mysql_fetch_array($result3);
                        }

                        
                        echo '<center>';
                        echo '<table border=1 align="center" bgcolor="white">';
                            echo '<tr>';
                            echo '<td align="center" bgcolor=AACCEE width=150><h2>帳號';
                            echo '<td align="center" bgcolor=AACCEE width=150><h2>學號/教職員編號<br>/身分證';
                            echo '<td align="center" bgcolor=AACCEE width=120><h2>密碼';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>姓名';
                            echo '<td align="center" bgcolor=AACCEE width=110><h2>電話';
                            echo '<td align="center" bgcolor=AACCEE width=250><h2>電子郵件';
                            echo '<td align="center" bgcolor=AACCEE width=110><h2>身分別(權限)';
                            
                            
                            echo '<tr>';
                            echo '<td align="center"><font size="3">'.$row[0].'</font>';
                            echo '<td align="center"><font size="3">'.$row1[1].'</font>';
                            echo '<td align="center"><font size="3">'.$row[1].'</font>';
                            echo '<td align="center"><font size="3">'.$row[2].'</font>';
                            echo '<td align="center"><font size="3">'.$row[3].'</font>';
                            echo '<td align="center"><font size="3">'.$row[4].'</font>';
                            echo '<td align="center"><font size="3">'.$row[5].'</font>';
                            
                        echo '</table>';
            ?>
                   
                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
                    </form>
                   
                    </div>
                    </div>
                    
                <?
                    }
                    else if($row[5]=="student"||$row[5]=="staff"||$row[5]=="others"){//如果是person
                        ?>
                        <div class="title">
                        <h1>修改基本資料</h1>
                        </div>
                        <div class="content">
                        <div class="content1">

                        <?
                        $getName=$getName_login;
                        //echo $getName;
                        $sql_query="select * from user where Account='".$getName."'";
                        $result=mysql_query($sql_query);
                        $row=mysql_fetch_array($result);
                        
                        if($row[5]=="student"){
                            $sql_query1="select * from student where Account='".$getName."'";
                            $result1=mysql_query($sql_query1);
                            $row1=mysql_fetch_array($result1);
                        }
                        else if($row[5]=="staff"){
                            $sql_query2="select * from staff where Account='".$getName."'";
                            $result2=mysql_query($sql_query2);
                            $row1=mysql_fetch_array($result2);
                        }
                        else if($row[5]=="others"){
                            $sql_query3="select * from others where Account='".$getName."'";
                            $result3=mysql_query($sql_query3);
                            $row1=mysql_fetch_array($result3);
                        }
                        echo '<h1>已成功修改資料</h1>';
                        echo '<h2>修改後的資料如下</h2>';
                        echo '<center>';
                        echo '<table border=1 align="center" bgcolor="white">';
                            echo '<tr>';
                            echo '<td align="center" bgcolor=AACCEE width=150><h2>帳號</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=150><h2>學號/教職員編號<br>/身分證';
                            echo '<td align="center" bgcolor=AACCEE width=120><h2>密碼</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=95><h2>姓名</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=110><h2>電話</h2>';
                            echo '<td align="center" bgcolor=AACCEE width=250><h2>電子郵件</h2>';
                            //echo '<td>身分別(權限)';
                            //$row=mysql_fetch_array($result);
                            
                            echo '<tr>';
                            echo '<td align="center"><font size="3">'.$row[0];
                            echo '<td align="center"><font size="3">'.$row1[1];
                            echo '<td align="center"><font size="3">'.$row[1];
                            echo '<td align="center"><font size="3">'.$row[2];
                            echo '<td align="center"><font size="3">'.$row[3];
                            echo '<td align="center"><font size="3">'.$row[4];
                            //echo '<td>'.$row[5];
                    
                        echo '</table>';
                ?>

                        <form method=get action='personHome.php'>
                        <p align="center">
                        <input value="使用者首頁" type="submit">
                        </form>
                
                        
                        </div>
                    </div>
                <?
                    }
                }
                ?>
            
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
