<?php
    $config = parse_ini_file("../config.ini");
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
 ?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Jeonghyeon Joo | Contact</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Jeonghyeon Joo | Contact">
    <meta property="og:url" content="http://jeonghyeonjoo.com/contact.php">
    <meta property="og:title" content="Jeonghyeon Joo">
    <meta property="og:type" content="website">
    <meta property="og:image" content="images/metaimg.png">
    <meta property="og:description" content="Jeonghyeon Joo | Contact">
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
				<li>
					<a href="photos.php">MEDIA</a>
					<ul>
						<li><a href="photos.php">PHOTOS</a></li>
						<li><a href="videos.php">VIDEOS</a></li>
					</ul>
				</li>
				<li class="current"><a href="contact.php">CONTACT</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<section id="main" style="margin-top: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<!-- Content -->
							<article class="box page-content">
								<header>
									<h2>Contact</h2>
								</header>
								<section>
									<form class="gform" method="POST" action="https://script.google.com/macros/s/AKfycbwV_90SpqPlW_fROJ33gZwE-0Damy36abw6Sb5l/exec">
										<div class="thankyou_message" style="display:none;">
									      <h1>Thank you! Your message has been sent successfully.</h1>
									    </div>
										<div class="form-elements">
											<div class="row">
												<div class="col-6 col-12-small">
													<input type="text" name="name" id="name" placeholder="Name" />
												</div>
												<div class="col-6 col-12-small">
													<input type="email" name="email" id="email" placeholder="Email" />
													<span class="email-invalid" style="display:none">
														Must be a valid email address
													</span>
												</div>
												<div class="col-12">
													<input type="text" name="subject" id="subject" placeholder="Subject" />
												</div>
												<div class="col-12">
													<textarea name="message" id="message" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li id="b4sending"><button onclick="changebutton()">Send Message</button></li>
														<li id="sending" style="display:none;">
															<button>
																<i class="fa fa-spinner fa-spin"></i> Please wait...
															</button>
														</li>
														<li><input type="reset" value="Clear Form" class="alt" /></li>
													</ul>
												</div>
											</div>
										</div>
									</form>
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
    <script data-cfasync="false" type="text/javascript" src="assets/js/form-submission-handler.js"></script>
	<script>
		function changebutton(){
			var b4sending = document.getElementById("b4sending");
			b4sending.style.display = "none";
			var sending = document.getElementById("sending");
			sending.style.display = "inline-block";
		}
	</script>
</body>

</html>
