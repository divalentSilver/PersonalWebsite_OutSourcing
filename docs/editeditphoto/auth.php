<link rel="stylesheet" href="../assets/css/admin.css" />
<?php
    $config = parse_ini_file("../../config.ini");
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

    $userId = $_REQUEST['userId'];
    $pass = $_REQUEST['password'];

    if(isset($userId) && isset($pass)){
        if($userId == $config['admid'] && $pass == $config['admpass']){
            session_start();
            $_SESSION['userId'] = $userId;
            header("Location: index.php");
            exit();
        }
    }
    echo "<h2 class='title'>Login error.</h2>";
    echo "<div class='login-page'>";
    echo "<div class='form'>";
    echo "<button onclick='gohome()'>Try Again</button>";
    echo "</div>";
    echo "</div>";
?>
<script>
    function gohome(){
        location.href="login.php";
    }
</script>
