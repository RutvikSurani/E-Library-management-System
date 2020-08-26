<html>

<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "library") or die(" not connected");
    $BookName = $_POST['BookName'];
    $Type = $_POST['Type'];
    $T =$Type ."/"; 
    $targetDir = "upload/" . $T ;
    $query = "SELECT * FROM `book` WHERE b_name='$BookName' and b_type='$Type'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($connection));
    $row = mysqli_fetch_row($result);
    $image=$row[4];
    $fileName =$row[3];

    if((unlink( "$targetDir" . $fileName)) && (unlink("$targetDir". $image))){
        $query = "DELETE  FROM `book` WHERE b_name='$BookName' and b_type='$Type'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($connection));

        if($result){
           
            $statusMsg = "The file ".$fileName." and ".$image."has been Deleted successfully.";

        }else{
            $statusMsg = "File delete failed, please try again.";

        } 
    }else{
        $statusMsg = "Sorry, there was an error in deleting your file.";

    }
    echo '<script> alert ("'.$statusMsg.'")</script>';
    echo '<script> window.location="http://localhost/WT/Admin/change.php" </script>';
    


    ?>
</body>

</html>