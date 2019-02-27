<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>
<body>
    <div class="logininfo">
        <input type="button" value="Logout" onclick="logout()">
    </div>

    <h2 class="title">Results:</h2>
    <div class="main-page">
        <p style="text-align:left;">
            <?php
                $target_dir = '../images/photos/';
                if( isset($_FILES['fileUpload']['name'])) {
                    $total_files = count($_FILES['fileUpload']['name']);
                    for($key = 0; $key < $total_files; $key++) {
                        if(isset($_FILES['fileUpload']['name'][$key]) && $_FILES['fileUpload']['size'][$key] > 0) {
                            $maxFileSize = 2 * 1024 * 1024; //2MB
                            $ext = strtolower(pathinfo($_FILES["fileUpload"]["name"][$key], PATHINFO_EXTENSION));
                            $errors = array();
                            if($_FILES['fileUpload']['size'][$key] > $maxFileSize){
                                $errors[$key] = 'File size is greater than allowed size(2MB).';
                            }
                            if( !in_array( $ext, array('jpg', 'jpeg', 'png'))) {
                                $errors[$key] = "This file extension is not allowed. Please upload a JPEG, JPG or PNG file.";
                            }
                            $original_filename = $_FILES['fileUpload']['name'][$key];
                            echo $key+1 . ". File name: " . basename($original_filename) . "</br>";
                            if (empty($errors[$key])) {
                                $target = $target_dir . basename($original_filename);
                                $tmp  = $_FILES['fileUpload']['tmp_name'][$key];
                                $didUpload = move_uploaded_file($tmp, $target);
                                if ($didUpload) {
                                    echo "Uploaded successfully.</br>";
                                } else {
                                    echo "Error occured: Uploading failure. Please try again.</br>";
                                }
                            }
                            else {
                                echo "Error occured: " . $errors[$key] . "</br>";
                            }
                            echo "-----------------</br>";
                        }
                    }
                }
            ?>
        </p>
        <button onclick='gohome()'>Go Back</button>
    </div>
    <script>
        function logout(){
            location.href="logout.php";
        }
        function gohome(){
            location.href="index.php";
        }
    </script>
</body>
</html>
