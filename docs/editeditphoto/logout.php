<link rel="stylesheet" href="../assets/css/admin.css" />
<?php
    session_start();
    if(isset($_SESSION['userId'])){
        unset($_SESSION['userId']);
        session_destroy();
        header("location:./login.php");
        exit();
    }
    echo "<h2 class='title'>Logout error.</h2>";
    echo "<div class='login-page'>";
    echo "<div class='form'>";
    echo "<button onclick='gohome()'>login</button>";
    echo "</div>";
    echo "</div>";
?>
<script>
    function gohome(){
        location.href="login.php";
    }
</script>
