<?php
    $config = parse_ini_file("../config.ini");
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
 ?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Jeonghyeon Joo | Performances</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Jeonghyeon Joo | Performances">
    <?php
        $sql_performances = "SELECT DISTINCT year FROM performances ORDER BY year DESC;";
        $result_performances = mysqli_query($conn, $sql_performances);
        $row = mysqli_fetch_array($result_performances);
        echo "<meta property='og:url' content='http://jeonghyeonjoo.com/performances.php?year={$row['year']}'>";
     ?>
    <meta property="og:title" content="Jeonghyeon Joo">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/metaimg.png">
    <meta property="og:description" content="Jeonghyeon Joo | Performances">
    <meta property="og:site_name" content="Jeonghyeon Joo">
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="homepage is-preload">
	<div id="page-wrapper">

		<!-- Header -->
        <header id="header">
			<div class="logo container">
				<div>
					<h1><a href="index.php" id="logo">JEONGHYEON JOO</a></h1>
				</div>
			</div>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<div class="container" style="height: 60px">
				<a href="index.php">
					<img alt="jeonghyeon joo" src="images/namelogo_black.png" height="40" style="margin-top: 20px;">
				</a>
			</div>
			<ul class="container" style="padding-left: 0px;">
				<li><a href="index.php">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li class="current">
					<?php
						$sql_performances = "SELECT DISTINCT year FROM performances ORDER BY year DESC;";
						$result_performances = mysqli_query($conn, $sql_performances);
						$row = mysqli_fetch_array($result_performances);
						echo "<a href='performances.php?year={$row['year']}'>PERFORMANCES</a>";
					 ?>
					<ul>
						<?php
							$result_performances = mysqli_query($conn, $sql_performances);
							while($row = mysqli_fetch_array($result_performances)){
								echo "<li><a href='performances.php?year={$row['year']}'>{$row['year']}</a></li>";
							}
						 ?>
					</ul>
				</li>
				<li>
					<a href="solo.php">REPERTOIRE</a>
					<ul>
						<li><a href="solo.php">SOLO</a></li>
						<li><a href="ensemble.php">ENSEMBLE</a></li>
					</ul>
				</li>
				<li><a href="writings.php">WRITINGS</a></li>
				<li>
					<a href="photos.php">MEDIA</a>
					<ul>
						<li><a href="photos.php">PHOTOS</a></li>
						<li><a href="videos.php">VIDEOS</a></li>
					</ul>
				</li>
				<li><a href="contact.php">CONTACT</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<section id="main" style="margin-top: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-2 col-12-medium">
						<div class="sidebar">

							<!-- Sidebar -->
							<section>
								<?php
									$thisyear = $_GET['year'];
									$sql_performances_s = "SELECT DISTINCT year FROM performances ORDER BY year DESC;";
									$result_performances_s = mysqli_query($conn, $sql_performances_s);
									while($row_s = mysqli_fetch_array($result_performances_s)){
										if ( $row_s['year'] == $thisyear){
											echo "<h3 class='current'><span><a href='performances.php?year={$row_s['year']}'>{$row_s['year']}</a></span></h3>";
										}
										else {
											echo "<h3><span><a href='performances.php?year={$row_s['year']}'>{$row_s['year']}</a></span></h3>";
										}
									}
								 ?>
							</section>
						</div>
					</div>
					<div class="col-10 col-12-medium imp-medium">
						<div class="content">
							<!-- Content -->
							<article class="box page-content">
								<header>
									<h2>Performances</h2>
									<?php
										echo "<p>{$thisyear}</p>";
									?>
								</header>
								<section>
									<?php
										$monthword = array(
											1 => "January",
											2 => "February",
											3 => "March",
											4 => "April",
											5 => "May",
											6 => "June",
											7 => "July",
											8 => "August",
											9 => "September",
											10 => "October",
											11 => "November",
											12 => "December",
										);
										$dayordinal = array('th','st','nd','rd','th','th','th','th','th','th');
										$sql_content = "SELECT * FROM performances WHERE year=$thisyear ORDER BY month DESC, day DESC;";
										$result_content = mysqli_query($conn, $sql_content);
										while($row = mysqli_fetch_array($result_content)){
											echo "<h3 style='color:#FBA84B;'>{$monthword[$row['month']]} ";
                                            if ($row['day']){
                                                if ($row['dayend']){
                                                    $number = $row['dayend'];
    												if (($number %100) >= 11 && ($number%100) <= 13)
    												   $abbreviation = $number. 'th';
    												else
    												   $abbreviation = $number. $dayordinal[$number % 10];
    												echo "{$row['day']}-$abbreviation, ";
                                                }
                                                else{
                                                    $number = $row['day'];
    												if (($number %100) >= 11 && ($number%100) <= 13)
    												   $abbreviation = $number. 'th';
    												else
    												   $abbreviation = $number. $dayordinal[$number % 10];
    												echo "$abbreviation, ";
                                                }
                                            }
											echo "{$row['year']}</h3>";
											echo "<p>";
											echo "<b style='font-size:110%;'>{$row['text1']}</b></br>";
											if ($row['text2']) echo "{$row['text2']}</br>";
											if ($row['place']) echo "@ <a href='{$row['placelink']}'>{$row['place']}</a>";
											echo "</p>";
										}
									 ?>
								</section>
							</article>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="container" style="margin-top: 40px;">
				<div class="row">
					<div class="column">
						<!-- Copyright -->
						<div class="copyright">
							<p>
								&copy; 2019 Jeonghyeon Joo.</br>
								Designed by Kaeun Rhee with <a href="http://html5up.net">HTML5 UP</a>
							</p>
						</div>
					</div>
					<div class="column">
						<!-- Contact -->
                        <ul class="contact">
							<li><a class="icon fa-envelope" href="mailto:jeonghyeonjoo@gmail.com"><span class="label">Email</span></a></li>
							<li><a class="icon fa-facebook-square" href="https://www.facebook.com/jeonghyeonjoo.1"><span class="label">Facebook</span></a></li>
							<li><a class="icon fa-youtube-play" href="https://www.youtube.com/user/jeonghyeonjoo"><span class="label">Youtube</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>
