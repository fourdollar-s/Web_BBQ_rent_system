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
        <h1>管理場地首頁</h1>
    </div>

    <div class="content">
        <div class="content1">
	        <h1>管理場地</h1>
            <h2>選擇要前往的功能頁面</h2>

            <center>
            <table border=1 align="center">
            <tr>
            <td align="center">
                <a href="allPlaceInfo.php"><h2>查看所有現有場地</h2></a>
                <a href="searchPlaceInfo.php"><h2>修改現有場地</h2></a>
                <a href="addNewPlace.php"><h2>新增場地</h2></a>
                <a href="deletePlace.php"><h2>刪除場地</h2></a>
            </td>
            </tr>
            </table>
            <form method=get action='adminHome.php'>
                <p align="center">
                <input value="管理人員首頁" type="submit">
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
