<?php
    $config = parse_ini_file("../config.ini");
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
 ?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Jeonghyeon Joo | Media - Photos</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="robots" content="index,follow">
    <meta name="description" content="Jeonghyeon Joo | Media - Photos">
    <meta property="og:url" content="http://jeonghyeonjoo.com/photos.php">
    <meta property="og:title" content="Jeonghyeon Joo">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/metaimg.png">
    <meta property="og:description" content="Jeonghyeon Joo | Media - Photos">
    <meta property="og:site_name" content="Jeonghyeon Joo">
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
	<link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon_57.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon_114.png"/>
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
				<li>
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
				<li class="current">
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
								<h3 class="current"><span><a href="photos.php">PHOTOS</a></span></h3>
								<h3><span><a href="videos.php">VIDEOS</a></span></h3>
							</section>
						</div>
					</div>
					<div class="col-10 col-12-medium imp-medium">
						<div class="content">
							<!-- Content -->
							<article class="box page-content">
								<header>
									<h2>Media</h2>
									<p>Photos</p>
								</header>
								<section>
									<?php
										$sql_photos = "SELECT * FROM media_photos ORDER BY seq ASC;";
										$result_photos = mysqli_query($conn, $sql_photos);
										while($row = mysqli_fetch_array($result_photos)){
											if($row['id'] % 3 == 1){
												echo "<div class='row' style='padding-top: 25px;'>";
											}
											echo "<div class='col-4 col-12-xsmall'>";
                                            echo "<div class='myDiv'>";
											echo "<a href='images/photos/{$row['src']}' data-lightbox='image' data-title='{$row['caption']}'>";
											echo "<img class='myImg' src='images/photos/{$row['src']}'>";
											echo "</a>";
                                            echo "</div>";
											echo "</div>";
											if($row['id'] % 3 == 0){
												echo "</div>";
											}
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
							<p>&copy; 2019 Jeonghyeon Joo.</p>
							<p>Designed by Kaeun Rhee with <a href="http://html5up.net">HTML5 UP</a></p>
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
	<script src="assets/js/lightbox.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>

	<script>
		lightbox.option({
            'fitImagesInViewport': true
		})

        $( window ).resize(function() {
            //location.reload(true);
        });

        var divwidth = $('.myDiv').width();
        $('.myDiv').css({
            'height': divwidth + 'px'
        });

        $(".myImg").lazyload({
            threshold: 300
        })
	</script>

</body>

</html>
