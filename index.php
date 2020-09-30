<?php
session_start();
	//error_reporting(0);
	require_once("mod/inc/config.php");
	require_once("mod/inc/connect.php");

	
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Pure PVP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.html" id="logo">PurePVP <em>Online</em></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href='?news'><span>News</span></a></li>
								<?php if(!isset($_SESSION['loggedin'])){ echo "<li><a href='?register'><span>Register</span></a></li>"; }?>
								<li>
									<a href="#">Ranking</a>
									<ul>
										<li><a href='?ranking=char'><span>Top Char</span></a>
										<li><a href='?ranking=job'><span>Top Job</span></a>
									</ul>
								</li>
							
								<li><a href='?download'><span>Download</span></a></li>
								<li class='last'><a href='?contact'><span>Contact</span></a></li>
								
							</ul>
						</nav>

				</div>
<div id="wrapper"> 
	<div id="leftcontent">
			<!-- Banner -->
				<section id="banner"></section>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major fa-headset"></i>
								  <h1>Server Info</h1>
									
	<div id="info-bar">Status:
	
	<?php $Status = @fsockopen($ServerIP, $ServerPort, $errno, $errstr, 0.3);

if($Status) { $Status = "<span style='color:#4D9C00;'>Online</span>"; }
else { $Status = "<span style='color:#e90000;'>Offline</span>"; }
echo "
		$Status<br/>
";


 ?>		
</div> 							
	<?php
	
	$online = sqlsrv_execute($connectacc, "SELECT top 1 * FROM _ShardCurrentUser WHERE nShardID = 64 ORDER BY nID desc");
    while ($online2 = sqlsrv_fetch_array($online)):
        echo '<div id="info-bar">Players: <span style="color:#4D9C00;">'.$online2['nUserCount'].'</span> / <span style="color:#4D9C00;">'.$slot.'</span></div> ';
       	endwhile; 
	   ?>
									
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major fa-chess-queen"></i>
									<h3>Fortres</h3>
	<div id="info-bar">
<?php
	
	$janganFW = sqlsrv_execute($connectshard, "select GuildID,TaxRatio from _SiegeFortress where FortressID = 1");
	while ($row = sqlsrv_fetch_array($janganFW)) {
		$janganID = $row['GuildID'];
		$janganTax = $row['TaxRatio'];
	}
	
	$banditFW = sqlsrv_execute($connectshard, "select GuildID,TaxRatio from _SiegeFortress where FortressID = 6");
	while ($row = sqlsrv_fetch_array($banditFW)) {
		$banditID = $row['GuildID'];
		$banditTax = $row['TaxRatio'];
	}
	
	$hotanFW = sqlsrv_execute($connectshard, "select GuildID,TaxRatio from _SiegeFortress where FortressID = 3");
	while ($row = sqlsrv_fetch_array($hotanFW)) {
		$hotanID = $row['GuildID'];
		$hotanTax = $row['TaxRatio'];
	}

	$jangan = sqlsrv_execute($connectshard, "select Name from _Guild where ID = '$janganID'");
	while ($row = sqlsrv_fetch_array($jangan)) {
		$janganOwner = $row['Name'];
	}
	
	
	$bandit = sqlsrv_execute($connectshard, "select Name from _Guild where ID = '$banditID'");
	while ($row = sqlsrv_fetch_array($bandit)) {
		$banditOwner = $row['Name'];
	}
	
	$hotan = sqlsrv_execute($connectshard, "select Name from _Guild where ID = '$hotanID'");
	while ($row = sqlsrv_fetch_array($hotan)) {
		$hotanOwner = $row['Name'];
	}
	
	
	print "<img style='vertical-align:middle;' src='template/fort-hotan.png' /> <span style='color:#FF2700;font-size:13px;'>Hotan fortress:</span><br />$hotanOwner <span style='color:#FF2700;font-size:13px;'>Tax:</span>  $hotanTax%<br /><br />";
	print "	<img style='vertical-align:middle;' src='template/fort-jangan.png' /> <span style='color:#FF2700;font-size:13px;'>Jangan fortress:</span><br />$janganOwner <span style='color:#FF2700;font-size:13px;'>Tax:</span>  $janganTax%<br /><br />";
	print "	<img style='vertical-align:middle;' src='template/fort-bandit.png' /> <span style='color:#FF2700;font-size:13px;'>Bandit fortress:</span><br />$banditOwner <span style='color:#FF2700;font-size:13px;'>Tax:</span> $banditTax%<br /><br />";

	?>
	</div>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<i class="icon solid major fa-gamepad"></i>
									<h3>Login</h3>
									<div id="panel">
			<?php include('mod/login.php'); ?>
		</div>
								</div>
							</section>
						</div>
				  </div>
				</section>

			<!-- Gigantic Heading -->
				<section class="wrapper style2">
					<div id="content">

							<!-- Content -->

								<article>
								<?php include("page.php"); ?>
								</article>

				  </div>
				</section>

			<!-- Posts -->
				<iframe width="560" height="315" src="https://www.youtube.com/embed/nDT0vSucc6o" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
				<iframe width="560" height="315" src="https://www.youtube.com/embed/egow42hfA_Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			<!-- CTA --><!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row"></div>
					</div>

					<!-- Icons -->
						<ul class="icons">
							
							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
						</ul>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; PurePVP Online</li><li>Design: Programasjc14@gmail.com</li>
							</ul>
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</div>
</div>
	</body>
</html>