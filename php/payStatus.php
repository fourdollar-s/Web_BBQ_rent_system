<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="content.css">
		<title>查詢繳費狀態</title>
	</head>
<style>


.box {
    width: 100%;
    height: 35px;
    margin: 0 auto;
    background-color: #FFCCC1;
}

.box a {
    font-size: 1.5rem;
    font-weight: bold;
    color: #FFF;
    padding: 0 30px;
    display: inline-block;
    text-decoration: none;
    text-align: center;
    margin: 0 auto;
}
.wrap {
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

.box a:hover {
    background-color: palevioletred;
    color: #444444
    transition: .9s;
}

</style>
<body>
		<!-- 網頁最上方的標題 -->
		<header>
			<h1><a href="home.php">高雄大學露營烤肉區租借系統</a></h1>
		</header>

		<!-- 網頁小標，該網頁之功能 -->
		<div class="title">
			<h1>查詢繳費狀態</h1>
		</div>

		<div class="box">
			<div class="wrap">
			<a href="allPaied.php">查看所有已繳費的租借單</a>
			<a href="allNotPaied.php">查看所有未繳費的租借單</a>
			<a href="searchPaiedByID.php">租借單編號搜尋</a>
			</div>
		</div>

		<div class="content">
			<div class="content1">
			<h1>「查看所有已繳費的租借單」會列出所有已完成繳費的租借單。<br>
			「查看所有未繳費的租借單」會列出所有未完成繳費的租借單。<br>
			「租借單編號搜尋」可透過輸入指定的租借單編號，查看單一租借單的繳費狀態。<br><br>
			<form method=get action='officeHome.php'>
                <p align="center">
                <input value="承辦人員首頁" type="submit">
            </form>
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