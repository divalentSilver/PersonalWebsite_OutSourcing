<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        $url = 'login.php';
        header("location: $url");
    }
?>
<!DOCTYPE html>
<html lang="en">
<script>
    var tid;
	var cnt = parseInt(600);
	function counter_init() {
		tid = setInterval("counter_run()", 1000);
	}

	function counter_reset() {
		clearInterval(tid);
		cnt = parseInt(600);
		counter_init();
	}

	function counter_run() {
		document.all.counter.innerText = time_format(cnt);
		cnt--;
		if(cnt < 0) {
			clearInterval(tid);
			self.location = "logout.php";
		}
	}
	function time_format(s) {
		var nHour=0;
		var nMin=0;
		var nSec=0;
		if(s>0) {
			nMin = parseInt(s/60);
			nSec = s%60;

			if(nMin>60) {
				nHour = parseInt(nMin/60);
				nMin = nMin%60;
			}
		}
		if(nSec<10) nSec = "0"+nSec;
		if(nMin<10) nMin = "0"+nMin;

		return ""+nHour+":"+nMin+":"+nSec;
	}
	function logout(){
		location.href="logout.php";
	}
</script>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
    <div class="logininfo">
        <b>Automatic logout after <span id="counter"> </span></b>
        <input type="button" value="Extend" onclick="counter_reset()">
        <input type="button" value="Logout" onclick="logout()">
    </div>
    
    <h2 class="title">Upload image files.</h2>
    <div class="main-page">
        <p style="text-align:left; padding-left:100px;">
            Each file has to meet the follwing conditions:</br>
            * file extension - JPEG, JPG or PNG</br>
            * file size - less than 2MB</br>
        </p>
        <form action="fileUpload.php" method="post" enctype="multipart/form-data">
            <label> Select Files: </label>
            <input type="file" name="fileUpload[]" multiple>
            <input type="submit" name="Submit" value="Upload">
        </form>
    </div>

    <script>
        counter_init();
    </script>
</body>

</html>
