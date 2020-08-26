<html>

<body>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "library") or die(" not connected");
    $email = $_POST['email'];
    $password1=$_POST['password'];
  if($email=="admin123@gmail.com" && $password1=="admin123" )
  {          
    $password1 = $_POST['password'];
    $_SESSION['admin']=$email;
    echo '<script> window.location="http://localhost/WT/Admin/change.php"</script>';
  
    } 
    else {
        session_destroy();
        echo "<script> alert('invalid User name And Password')</script>";
        echo '<script> window.location="http://localhost/WT/Admin/Alogin.html"</script>';

    }
    ?>
</body>

</html>