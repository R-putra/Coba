<?php
	include "koneksi.php";
	$limit="limit 0,5";
	if (isset($_GET['menu'])){
		$menu = $_GET['menu'];
		if($menu!="BNI"&&$menu!="BCA"&&$menu!="Mandiri"){
			$menu="home";
		}
	}
	else {
		$menu="home";
	}	
?>
<html>
	<head>
		<title>Kurs</title>
		<script src="script/jquery.min.js" type="text/javascript"></script>
		<script src="script/script.js" type="text/javascript"></script>
		<script src="script/highcharts.js" type="text/javascript"></script>
		<script src="script/exporting.js"  type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="shortcut icon" href="gambar/rp.ico"/>
		<meta http-equiv="Cache-Control" content="no-cache" />  
	</head>
	<body onLoad="fixed()">
		<div class="logo">
			<a href='<?php echo $_SERVER['SCRIPT_NAME']; ?>'><div></div></a>
		</div>
		<div class="bersih">&nbsp;</div>
		<div id=menubar-clone></div>
		<div class=menubar id="menubar">
			<center>
				<?php
				echo "
				<ul>
					<li><a href='".$_SERVER['SCRIPT_NAME']."'>Home</a>
					<li><a href='?menu=BNI'>BNI</a>
					<li><a href='?menu=BCA'>BCA</a>
					<li><a href='?menu=Mandiri'>Mandiri</a>
				</ul>
				";
				?>
			</center>
		</div>
		<div class="bersih">&nbsp;</div>
		<div class="grid">
			<div class="gr12 konten">
				<div class=grid>
				<?php
				include "$menu.php";
				?>
				</div>
			</div>
		</div>
	</body>
</html>