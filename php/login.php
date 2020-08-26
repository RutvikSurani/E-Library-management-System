<html>

<body>
    <?php

    /*function alert()
{
       echo '<script> alert("invalid")</script> ';
       redirect();

}

function redirect()
{
     echo '<script> window.location="http://localhost/rutvik/se/1.html"</script>'; 
   
}*/

    $conn = mysqli_connect("localhost", "root", "", "library") or die(" not connected");
    $i = 0;
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    session_start();
    $_SESSION["useremail"] = "$email";
    $result1 = mysqli_query($conn, "SELECT FirstName FROM `login` WHERE Email_id='$email'");
    $query1 = mysqli_fetch_row($result1);
    if (!empty($email) || !empty($password1)) {
        // Assigning POST values to variables.
        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM `login` WHERE Email_id='$email' and CreatePassword='$password1'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($connection));

        $row = mysqli_fetch_row($result);
        
        $count = mysqli_num_rows($result);
        if ($count) {
            $_SESSION["username"] = "$row[1]";
            header("Location:../OEP.php");
        } else {
            echo '<script> alert("invalid")</script> ';
            session_destroy();
            echo '<script> window.location="http://localhost/WT/1.php"</script>';
            //alert();
        }
    } else {
        //  session_destroy();
        echo "Filed is  not set";
    }
    ?>
</body>

</html>