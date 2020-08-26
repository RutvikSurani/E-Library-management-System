
 <html>
    <body>

    <?php  
    $conn = mysqli_connect("localhost","root","","library") or die(" not connected");
     $file_name=$_FILES['file']['name'];
     $size=$_FILES['file']['size'];
     $BookName=$_POST['BookName'];
     $AuthorName=$_POST['AuthorName'];
     $Type=$_POST['Type'];
     $statusMsg = '';
     $T =$Type ."/"; 
    
// File upload path
$targetDir = "upload/" . $T ;
$fileName = basename($_FILES["file"]["name"]);
$imageName = basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir .  $fileName;
$targetFilePath2 = $targetDir . $imageName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$imageType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

  
     if((!empty($_FILES["file"]["name"])) && (!empty($_FILES["file"]["name"])))
     {
        // Allow certain file formats
        $fallowTypes = array('pdf');
        $iallowTypes = array('jpeg','jpg','png');
        if((in_array($fileType, $fallowTypes)) && (in_array($imageType, $iallowTypes))){
           
            // Upload file to server
            if((move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) && (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath2))){
                // Insert image file name into database
                $insert = $conn->query("INSERT into book (b_name,b_author,b_type,f_name, i_name, upload_on) VALUES ('".$BookName."','".$AuthorName."','".$Type."','".$fileName."', '".$imageName."', NOW())");
              
                if($insert){
                   
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";

                }else{
                    $statusMsg = "File upload failed, please try again.";

                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";

            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';

        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
    echo '<script> alert ("'.$statusMsg.'")</script>';
    echo '<script> window.location="http://localhost/WT/Admin/change.php" </script>';
   // header("Location: ../OEP.php");  
    ?>

</body>
</html> 