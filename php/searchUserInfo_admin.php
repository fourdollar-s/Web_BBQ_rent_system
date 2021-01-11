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

        <div class="title">
            <h1>修改基本資料</h1>
            
        </div>

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
            <form method="post" action="">
                <div class="content">
                    <div class="content1">
                        
                        <tr>
                    <?
                        echo '<h1>請輸入欲更改的使用者帳號<br></h1></tr>';
                    ?>
                        <tr><td align="center"><h2>帳號</td>
                        <td align="left"><input type=text size="20" name="usrName" value=''></td>
                        </h2>
                        </tr>

                        <p align="center">
                        <input value="確認" type="submit">
                        <input value="清除" type="reset">

                    </form>
                    <form method=get action='adminHome.php'>
                    <p align="center">
                    <input value="管理員首頁" type="submit">
                    </form>
                    
                <?
                    $getName=$_POST["usrName"];
                    if($getName!=NULL){

                        
                        $sql_query="select * from user where Account='".$getName."'";
                        $result=mysql_query($sql_query);
                        if(mysql_num_rows($result)==0)
                            echo '<h2>找不到帳號='.$getName.'，請重新輸入</h2>';
                        else{
                            //echo '找到使用者';
                            session_start();
                            //unset($_SESSION["personName_adminChange"]);
                            $_SESSION['personName_adminChange']=$getName;
                            //$getName1=$_SESSION['personName_adminChange'];
                            //echo "name = ".$getName1;
                            header("Location:editUserInfo.php"); exit;
                        }
                    }
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
