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
            //echo '修改基本資料頁面<br>';
            $select_db=@mysql_select_db("rentsystem");//選資料表
            if(!$select_db)
                echo 'fail';
            else{
        ?>
                <form method="get" action="">
                        <tr>
                    <?
                        session_start();
                        $getName_login=$_SESSION['personName_login'];
                        //echo 'name='.$getName_login;

                        //查詢目前的帳號權限
                        $sql_query="select * from user where Account='".$getName_login."'";
                        $result=mysql_query($sql_query);
                        $row=mysql_fetch_array($result);
                        
                        //admin是做查詢帳號修改，所以是接到的值
                        if($row[5]=="admin"){
                            $flag=0;
                            //echo 'admin now';
                            session_start();
                            $getName=$_SESSION["personName_adminChange"];
                            $sql_query="select * from user where Account='".$getName."'";
                            $result=mysql_query($sql_query);
                            
                            $row=mysql_fetch_array($result);
                            if($row[5]=="student"){
                                
                               // echo $getName;
                                $sql_query1="select Student_id from student where Account='".$getName."'";
                                $result1=mysql_query($sql_query1);
                                $row1=mysql_fetch_array($result1);
                                
                                //echo $row1[1];
                            }
                            else if($row[5]=="staff"){
                                // echo $getName;
                                $sql_query1="select staff_id from staff where Account='".$getName."'";
                                $result1=mysql_query($sql_query1);
                                $row1=mysql_fetch_array($result1);
                                 
                                //echo $row1[1];
                            }
                            else if($row[5]=="others"){
                                // echo $getName;
                                $sql_query1="select id from others where Account='".$getName."'";
                                $result1=mysql_query($sql_query1);
                                $row1=mysql_fetch_array($result1);
                                 
                                //echo $row1[1];
                            }
                            else
                                $flag=1;
                            
                            
                            ?>
                            <div class="title">
                                <h1>修改基本資料</h1>
                                
                            </div>
                            <div class="content">
                            <?

                            echo '<div class="content1">';
                           
                                echo '<h1>目前更改的帳號為:'.$getName.'<br></h1>';
                                
                                echo '<center>';
                                echo '<table border=1 align="center" bgcolor="white">';
                                    echo '<tr>';
                                    echo '<td align="center" bgcolor=AACCEE width=150><h2>帳號</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=150><h2>學號/教職員編號/身分證</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=120><h2>密碼</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=95><h2>姓名</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=110><h2>電話</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=250><h2>電子郵件</h2>';
                                    echo '<td align="center" bgcolor=AACCEE width=110><h2>身分別(權限)</h2>';
                                    
                                    if($flag==0){
                                        
                                        echo '<tr>';
                                        echo '<td align="center"><input type=text size="17" name="acc" value="'.$row[0].'">';
                                        echo '<td align="center"><input type=text size="17" name="id" value="'.$row1[0].'">';
                                        echo '<td align="center"><input type=text size="10" name="password" value="'.$row[1].'">';
                                        echo '<td align="center"><input type=text size="5" name="name" value="'.$row[2].'">';
                                        echo '<td align="center"><input type=text size="9" name="tel" value="'.$row[3].'">';
                                        echo '<td align="center"><input type=text size="30" name="mail" value="'.$row[4].'">';
                                        echo '<td align="center"><input type=text size="11" name="type" value="'.$row[5].'">';
                                    }
                                    else{
                                        echo '<tr>';
                                        echo '<td align="center"><input type=text size="17" name="acc" value="'.$row[0].'">';
                                        echo '<td align="center">-';
                                        echo '<td align="center"><input type=text size="10" name="password" value="'.$row[1].'">';
                                        echo '<td align="center"><input type=text size="5" name="name" value="'.$row[2].'">';
                                        echo '<td align="center"><input type=text size="9" name="tel" value="'.$row[3].'">';
                                        echo '<td align="center"><input type=text size="30" name="mail" value="'.$row[4].'">';
                                        echo '<td align="center"><input type=text size="11" name="type" value="'.$row[5].'">';
                                    }
                                    
                                echo '</table>';
                                ?>
                                <p align="center">
                                <input value="送出" type="submit">
                                </form>

                                <form method=get action='adminHome.php'>
                                <p align="center">
                                <input value="管理員首頁" type="submit">
                                </form>
                                <?
                            
                        }

                        //person的話只能修改自己的帳號
                        else if($row[5]=="student"||$row[5]=="staff"||$row[5]=="others"){
                            ?>
                            <div class="title">
                                <h1>修改基本資料</h1>
                            </div>
                            <div class="content">
                            <?
                            echo '<div class="content1">';
                                echo '<h1>目前更改的帳號為:'.$getName_login.'<br></h1>';
                                $getName=$getName_login;

                                if($row[5]=="student"){
                                
                                    //echo $getName;
                                     $sql_query1="select Student_id from student where Account='".$getName."'";
                                     $result1=mysql_query($sql_query1);
                                     $row1=mysql_fetch_array($result1);
                                     
                                     //echo $row1[1];
                                 }
                                 else if($row[5]=="staff"){
                                     // echo $getName;
                                     $sql_query1="select staff_id from staff where Account='".$getName."'";
                                     $result1=mysql_query($sql_query1);
                                     $row1=mysql_fetch_array($result1);
                                      
                                     //echo $row1[1];
                                 }
                                 else if($row[5]=="others"){
                                     //echo $getName;
                                     $sql_query1="select id from others where Account='".$getName."'";
                                     $result1=mysql_query($sql_query1);
                                     $row1=mysql_fetch_array($result1);
                                      
                                     //echo $row1[1];
                                 }

                                echo '<center>';
                                echo '<table border=1 align="center" bgcolor="white">';
                                echo '<tr>';
                                echo '<td bgcolor=AACCEE align="center"><h2>帳號</h2></td>';
                                echo '<td align="center" bgcolor=AACCEE width=150><h2>學號/教職員編號/身分證</h2>';
                                echo '<td bgcolor=AACCEE align="center"><h2>密碼</h2></td>';
                                echo '<td bgcolor=AACCEE align="center"><h2>姓名</h2></td>';
                                echo '<td bgcolor=AACCEE align="center"><h2>電話</h2></td>';
                                echo '<td bgcolor=AACCEE align="center"><h2>電子郵件</h2></td>';
                                //echo '<td>身分別(權限)';
                                echo '</tr>';

                                echo '<tr>';
                                echo '<td align="center"><input type=hidden name="acc" value="'.$row[0].'"><font size="3">'.$row[0];
                                echo '<td align="center"><input type=hidden size="17" name="id" value="'.$row1[0].'"><font size="3">'.$row1[0];
                                echo '<td><input type=text size="10" name="password" value="'.$row[1].'">';
                                echo '<td><input type=text size="10" name="name" value="'.$row[2].'">';
                                echo '<td><input type=text size="10" name="tel" value="'.$row[3].'">';
                                echo '<td><input type=text size="25" name="mail" value="'.$row[4].'">';
                                echo '<input type=hidden name="type" value="'.$row[5].'">';
                                
                                echo '</table>';
            ?>
                                <p align="center">
                                <input value="送出" type="submit">
                                </form>
                                
                                <form method=get action='personHome.php'>
                                <p align="center">
                                <input value="使用者首頁" type="submit">
                                </form>

            <?
                
                            
                        }
            ?>  
                        
                        
                    

                    


                <!--接收到修改的資料-->
            <?
                $acc=$_GET["acc"];
                $id=$_GET["id"];
                $password=$_GET["password"];
                $name=$_GET["name"];
                $tel=$_GET["tel"];
                $mail=$_GET["mail"];
                $type=$_GET["type"];
                //echo $id;
                
                $flag=0;
                //echo 'acc='.$acc.'pw='.$password.'name='.$name.'tel='.$tel.'mail='.$mail.'type='.$type;
                //update user set Account='a1075519',Password='123456',Name='林于庭',phone='0987654321',email'a1075519@mail.nuk.edu.tw',Type='admin' where Account='a1075519';
                if($acc!=NULL&&$password!=NULL&&$name!=NULL){
                    if($tel!=NULL&&$mail!=NULL&&$type!=NULL&&$id!=NULL){
                        
                        $sql_query="update user set Account='".$acc."',Password='".$password."',Name='".$name."',phone='".$tel."',email='".$mail."',Type='".$type."' where Account ='".$getName."'";
                        mysql_query($sql_query);
                        //echo '原本='.$getName;
                        //echo ' 修改='.$acc;

                        if($acc!=$getName){
                            session_start();
                            unset($_SESSION["personName_adminChange"]);
                            $_SESSION["personName_adminChange"]=$acc;
                        }
                        //echo $type;
                        if($type=="student"){
                            //echo '學號='.$id.'<br>';//學號
                            //echo '要改的='.$acc.'<br>';//要改的
                            //echo '原本的='.$getName.'<br>';//原本的
                            $sql_query1="update student set Student_id='".$id."' where Account ='".$acc."'";
                            mysql_query($sql_query1);
                        }
                        else if($type=="staff"){
                            $sql_query2="update staff set Staff_id='".$id."' where Account ='".$acc."'";
                            mysql_query($sql_query2);
                        }
                        else if($type=="others"){
                            $sql_query3="update others set id='".$id."' where Account ='".$acc."'";
                            mysql_query($sql_query3);
                        }

                        //session_start();
                            
                        //echo '已成功修改資料'."<br>";
                        header("Location:success.php"); exit;
                    }
                    else
                        $flag=1;
                }
                else
                    $flag=1;

                if($flag==1){
                    echo '<h2>欄位皆不可為空</h2>';
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
