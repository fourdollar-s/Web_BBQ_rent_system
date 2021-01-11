<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
<?php include "content.css"; ?>
</style>
		<title>場地租借</title>
	</head>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<div class="title">
			<h1>租借申請表</h1>
			
        	</div>

        	<div class="content">
			<div class="content1">
			

<h1>
	<?php
		include("connect.php");
		$select_db=@mysql_select_db("rentsystem");
		if(!$select_db)
			echo '<br>fail</br>';
		else{
			session_start();
			$getId=$_SESSION['personName_login'];

			$sql_query="select Name from user where Account='".$getId."'";
			$result = mysql_query($sql_query);
			$getName=mysql_fetch_array($result);
			
	?>

		<form method="post" action="receipt_check.php">

			
			<center>
			<table border="1" width="55%" bgcolor=white>

			<tr>
			<td align="center" width=100 bgcolor=AACCEE>帳號</td>
			<td align="left" style="padding:3px;"><?echo $getId;?></td>
			</tr>

			<!--申請人姓名-->
			<tr>
			<td align="center" width=70 bgcolor=AACCEE>姓名</td>
			<td align="left" style="padding:3px;"><?echo $getName[0];?></td>
			</tr>


			<?
				$sql_query="select phone from user where Account='".$getId."'";
				$result = mysql_query($sql_query);
				$getTel=mysql_fetch_array($result);
			?>
			<!--連絡電話-->
			<tr>
			<td align="center" bgcolor=AACCEE>聯絡電話</td>
			<td align="left" style="padding:3px;"><?echo $getTel[0];?></td>
			</tr>

			<?
				$sql_query="select email from user where Account='".$getId."'";
				$result = mysql_query($sql_query);
				$getMail=mysql_fetch_array($result);
			?>
			<!--信箱-->
			<tr>
			<td align="center" bgcolor=AACCEE>電子信箱</td>
			<td align="left" style="padding:3px;"><?echo $getMail[0];?></td>
			</tr>


			<!--租借場地-->
			<tr>
			<td align="center" bgcolor=AACCEE>場地種類</td>
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
			<td align="center" bgcolor=AACCEE>場地編號</td>
			<td align="left" width=160 style="padding:3px;">
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
					<input value= "<?echo $result['Place_no']?>" type="checkbox" name="place2[]" ><?echo $place_no_DB[1]?></option>
			<?php
				}
			?>
			</select>
			</td>
			</tr>

			<!--地址-->
			<tr>
			<td align="center" bgcolor=AACCEE>地址</td>
			<td align="left" style="padding:3px;">
			<input type=text size="40" name="address" style="padding:3px;">
			</td>
			</tr>
			
			<!--活動人數-->
			<tr>
			<td align="center" bgcolor=AACCEE>活動人數</td>
			<td align="left" style="padding:3px;">
			<input type=text size="10" name="peopleNum" style="padding:3px;">
			</td>
			</tr>

			<!--統一編號-->
			<tr>
			<td align="center" bgcolor=AACCEE>統一編號<?echo '<br>';?>(選填)</td>
			<td align="left" style="padding:3px;">
			<input type=text size="40" name="tax_id" style="padding:3px;">
			</td>
			</tr>

			<!--稅籍編號-->
			<tr>
			<td align="center" bgcolor=AACCEE>稅籍編號<?echo '<br>';?>(選填)</td>
			<td align="left" style="padding:3px;">
			<input type=text size="40" name="tin" style="padding:3px;">
			</td>
			</tr>

			<!--時段-->
			<tr>
			<td align="center" bgcolor=AACCEE>日期</td>
			<td align="left" style="padding:3px;">
			<input name="date" type="date" value="<?echo date('Y-m-d');?>">
			</td>
			</tr>

			<tr>
			<td align="center" bgcolor=AACCEE>時段</td>
			<td align="left" style="padding:3px;">
			<?
				if($get=="露營位"){
					echo '時段固定：12:30~翌日11:30'."<br>";
				}
				else if($get=="烤肉台"){
					echo '當天';
			?>
					<select name="hour">
					<option value="">請選擇</option>
			<?
					for($i=1;$i<24;$i++){
			?>
						<option value=<?echo $i?>><?echo $i?>點</option>
			<?
			//for
					}
			?>
					</select>
					<select name="min">
						<option value="">請選擇</option>
						<option value="0">00分</option>
						<option value="15">15分</option>
						<option value="30">30分</option>
						<option value="45">45分</option>
					</select>
			<?
			//else if
					echo '開始，共';
			?>
					<input type=text size="4" name="period">
			<?
					echo '個時段'."<br>";
				}
			?>
			</td>
			</tr>

			<tr>
			<td align="center" bgcolor=AACCEE>提供設備</td>
			<td align="left" style="padding:3px;">
			<?
				if($get=="露營位")
					echo '提供水電、洗手間、夜間照明及沐浴熱水'."<br>";
				
				else if($get=="烤肉台")
					echo '提供水電、洗手間'."<br>";
			?>
			</td>
			</tr>

			<tr>
			<td align="center" bgcolor=AACCEE>備註</td>
			<td align="left" style="padding:3px;">
			<?
				echo "1.1時段為4小時．若有特殊需求，請洽事務組 07-5919094"."<br>";
				echo "2.若是校外人士租借，汽車停車收費方式(請先自備場地繳費收據正本或影本，並於進校園時出示給警衛室)：將以日計費/每台車收30元"."<br>";
			?>
			</td>
			</tr>

			<tr>
			<td align="center" bgcolor=AACCEE>注意事項</td>
			<td align="left" style="padding:3px;">
			<?
				echo "1.請於使用前三天辦理完成"."<br>";
				echo "2.申請案經本校審核通過並接獲通知後，最遲需於使用前一日將應繳款項"."<br>";
				echo "3.繳費方式："."<br>";
				echo "&nbsp;&nbsp;(1)(此帳號無法使用ATM)臨櫃匯至「帳戶：033056000076(土地銀行高雄分行)，戶名：國立高雄大學401專戶」後，來電通知或將繳費收據傳真至本校，傳真號碼：(07)591-9017"."<br>";
				echo "&nbsp;&nbsp;(2)逕至本校總務處出納組現金繳費"."<br>";
				echo "4.因本校須向國稅局繳納營業稅，請繳款人詳填公司名稱、統一編號或稅籍編號"."<br></h1>";
			?>
			</td>
			</tr>

			<?
				# 設定時區
				date_default_timezone_set('Asia/Taipei');

				# 取得日期與時間（新時區）
				$datetime = date('Y/m/d H:i:s');
				echo '<input type="hidden" name="time_now" value="'.$datetime.'">';
			?>

			</table>

			<p align="center">
			<input value="送出" type="submit">
			<input value="清除" type="reset">
		</form>
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
