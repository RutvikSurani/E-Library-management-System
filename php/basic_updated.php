
 <?php
 $conn = mysqli_connect("localhost","root","","library") or die(" not connected");
 if((isset($_POST['FirstName'])&& $_POST['LastName'] !=''))
{
   $fname=$conn->real_escape_string($_POST["FirstName"]);
   $lname=$conn->real_escape_string($_POST["LastName"]);
   $email=$conn->real_escape_string($_POST["Email-id"]);
   $mobile=$conn->real_escape_string($_POST["MobileNumber"]);
   $password=$conn->real_escape_string($_POST["CreatePassword"]);
   $cpassword=$conn->real_escape_string($_POST["ConfirmPassword"]);
   echo $fname;
    echo $email;  
// Check connection

//  $query = mysqli_query($con,"insert into login(FirstName ,LastName , Email-id ,MobileNumber ,CreatePassword ,ConfirmPassword ) values ('$fname','$lname', '$email', '$mobile', '$password','$cpassword')");

 
 $sql = "insert into login(FirstName ,LastName , Email_id ,MobileNumber ,CreatePassword ,ConfirmPassword ) values ('".$fname."','".$lname."', '".$email."','".$mobile."', '".$password."','".$cpassword."')";
if(!$result = $conn->query($sql))
{
die('There was an error running the query [' . $conn->error . ']');
}
else
{
$to=$email;
$re="Succses Fully Regisater To E-Library";
$msg="Welcome To e-library the mountain of Knowledge"; 
$header="From:rutviksurani31@gmail.com";
mail($to,$re,$msg,$header);   
header("Location: ../OEP.php");
}
}
else
{
echo "Please fill Name and Email";
}
?>

