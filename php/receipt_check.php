<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<style>
		<?php include "content.css"; ?>
		</style>
		<title>確認送出資料</title>
	</head>

<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
			<h1>確認申請資料</h1>
			
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
        //$Id=$_GET["usrId"];
        //$name=$_GET["usrName"];
        //$tel=$_GET["tel"];
        $peopleNum=$_POST["peopleNum"];
        $place1=$_POST["place1"];
        $place2=$_POST["place2"];
        
        $date=$_POST["date"];
        $address=$_POST["address"];
        $tax_id=$_POST["tax_id"];
        $tin=$_POST["tin"];
		$time_now=$_POST["time_now"];
		
        if($peopleNum==NULL||$place2==NULL||$date==NULL||$address==NULL||$time_now==NULL){
			echo '<h1>申請失敗</h1>';
			echo '<h1>請確實填寫表格<br></h1>';
			?>
			<form>
			<p align="center">
	    	<input value="回到上一頁" type="button" onclick="history.back()">
    		</form>
			<?
		}

		else{
			
			$flag=0;

			for($i=0;$i<count($place2);$i++){
				//echo $place2[$i];
				$sql_query="select * from receipt_list where Place_no='".$place2[$i]."'";
				$result=mysql_query($sql_query);
				
				while($row=mysql_fetch_array($result)){
						//echo $row[0];
						$sql_query="select * from receipt where Receipt_no='".$row[0]."'";
						$result=mysql_query($sql_query);
						while($row=mysql_fetch_array($result)){
							if($flag==1)
								break;
							if($date==$row[9] && $place1 == "露營位"){
								$flag=1;
							}
							else if($date==$row[9] && $place1 == "烤肉台"){
								
								$time_1=explode("~",$row[10]);//8:00 16:00
								$time_start_already=explode(":",$time_1[0]);
								$time_end_already=explode(":",$time_1[1]);

								$hour=$_POST["hour"];
								$min=$_POST["min"];
								$period=$_POST["period"];

								//echo $time_start_already[0]." ".$time_end_already[0].'<br>';
								
								$period_time=$period*4;//幾個時段
								$end_time=$hour+$period_time;//結束的小時

								//echo $hour.' '.$end_time;
								if($min==0)
									$min_string="00";//分鐘
								if($hour>$time_start_already[0]&&$hour<$time_end_already[0]){//開始的時間卡到已租借
									$flag=1;
									break;
								}
			
								else if($end_time>$time_start_already[0] && $end_time<$time_end_already[0]){//結束的時間卡到已租借
									$flag=1;
									break;
								}
			
								else if($hour<$time_start_already[0]&&$end_time>$time_start_already[0]){//看租借時段的尾端有無重疊
									$flag=1;
									break;
								}
			
								else if($hour>$time_start_already[0]&&$hour<$time_end_already[0]){//看租借時段的前端有無重疊
									$flag=1;
									break;
								}	
								//echo $flag;
							}
						}
					
				}
			}

			if($flag==1){
				echo '<h1>申請失敗</h1>';
				echo '<h1>欲申請之場地中，有場地已被租借<h1>';
				?>
				<form>
				<p align="center">
				<input value="回到上一頁" type="button" onclick="history.back()">
				</form>
				<?
			}
			else{

				session_start();
				$getId=$_SESSION['personName_login'];

				$sql_query="select Name from user where Account='".$getId."'";
				$result = mysql_query($sql_query);
				$getName=mysql_fetch_array($result);
				
				//$cnt=5;
				//if($cnt<count($place2)){
				//	
				//}

				$place2_new=implode(",",$place2);
				
		?>
				<form method="post" action="receipt_done.php">
				<h2>請確認以下資料是否正確<br></h2>

					<center>
					<table border="1" width="45%" bgcolor=white>

					<tr>
					<td align="center" width=100 bgcolor=AACCEE><h2>帳號</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden" name="usrId" value="<?echo $getId; ?>"><?echo $getId;?></td>
					</tr>

					<!--申請人姓名-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>姓名</td>
					<td align="left" style="padding:3px;"><font size="3"><?echo $getName[0];?></td>
					</tr>


					<?
						$sql_query="select phone from user where Account='".$getId."'";
						$result = mysql_query($sql_query);
						$getTel=mysql_fetch_array($result);
					?>
					<!--連絡電話-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>聯絡電話</td>
					<td align="left" style="padding:3px;"><font size="3"><?echo $getTel[0];?></td>
					</tr>

					<?
						$sql_query="select email from user where Account='".$getId."'";
						$result = mysql_query($sql_query);
						$getMail=mysql_fetch_array($result);
					?>
					<!--信箱-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>電子信箱</td>
					<td align="left" style="padding:3px;"><font size="3"><?echo $getMail[0];?></td>
					</tr>

					<!--地址-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>地址</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden" name="address" value="<?echo $address; ?>"><?echo $address; ?></td>
					</tr>

					<!--地址-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>活動人數</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="peopleNum" value="<?echo $peopleNum; ?>"><?echo $peopleNum; ?></td>
					</tr>

					<!--場地種類-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>場地種類</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="place1" value="<?echo $place1;?>"><?echo $place1;?></td>
					</tr>

					<!--場地編號-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>場地編號</td>
					<td align="left" width=100 style="padding:3px;"><font size="3"><input type="hidden"  name="place2" value="<?echo $place2_new;?>"><?	
						$i=0;
						$j=0;
						while($i<count($place2)){
							
							echo $place2[$i].' ';
							
							if($j==5){
								echo '<br>';
								$j=0;
							}
							$j++;
							$i++;
						}
						?></td>
					</tr>

					<!--統一編號-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>統一編號</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="tax_id" value="<?echo $tax_id;?>"><?echo $tax_id;?></td>
					</tr>


					<!--稅籍編號-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>稅籍編號</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="tin" value="<?echo $tin;?>"><?echo $tin;?></td>
					</tr>

					<!--申請日期-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>申請日期</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="time_now" value="<?echo $time_now;?>"><?echo $time_now;?></td>
					</tr>

					<!--日期-->
					<tr>
					<td align="center" bgcolor=AACCEE><h2>租借時段</td>
					<td align="left" style="padding:3px;"><font size="3"><input type="hidden"  name="date" value='"<?echo $date;?>"'><?echo $date;?>

			<?
				if($place1=="烤肉台"){
					$hour=$_POST["hour"];
					$min=$_POST["min"];
					$period=$_POST["period"];

					//echo 'time='.$hour.$min.$period;
			?>
					<!--時間-->
					
					<?
						$period_time=$period*4;
						$end_time=$hour+$period_time;
						if($min==0)
							$min_string="00";
						else
							$min_string=(String)$min;
						$time=(String)$hour.":".$min_string."~".(String)$end_time.":".$min_string;
						
						
						echo $time."，共".$period."個時段";
						echo '<input type="hidden" name="time" value="'.$time.'">';
					
					?>
					</td>
					</tr>
			<?
				}
				else{
			?>
					<?echo '12:30~翌日11:30';?>
					<?echo '<input type="hidden" name="time" value="12:30~翌日11:30">';?>
					</td>
					</tr>
			<?
				}
			?>
				<tr>
					<td align="center" bgcolor=AACCEE><h2>提供設備</td>
					<td align="left" style="padding:3px;"><font size="3">
					<?
						if($place1=="露營位")
							echo '提供水電、洗手間、夜間照明及沐浴熱水'."<br>";
						
						else if($place1=="烤肉台")
							echo '提供水電、洗手間'."<br>";
					?>
					</td>
				</tr>
		
				</table>
				<p align="center">
				<input value="確定" type="submit">
				<input value="回到上一頁" type="button" onclick="history.back()">
				</form>

				<form method=get action='personHome.php'>
                    <p align="center">
                    <input value="使用者首頁" type="submit">
                </form>
	<?
			}
		}
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
