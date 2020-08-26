<html>

<head>
  <link href="style.css" rel="stylesheet" type="text/css">

  <title>Registration</title>
  <style>
    a {
      text-decoration: none;
    }
  </style>
  <script type="text/javascript">
    function V() 
    {
      var n = "^[a-zA-Z]{3,15}$";
      var p = "[a-zA-Z0-9@_$%]{6,}";
      var number = "^[7-9][0-9]{9}$";
      var email = "^[a-zA-Z0-9_.]+@[a-zA-Z]{2,}.[a-zA-Z]{2,3}$";
      var reg=new RegExp(n);
      
      if (!reg.test(document.getElementById("fname").value)) 
      {
        alert("please enter valid first name")
        return false;
      }
     
      if (!reg.test(document.getElementById("lname").value)) {
        alert("please enter valid middel name")
        return false;
      }
      var reg=new RegExp(email);
      if (!reg.test(document.getElementById("email").value)) {
        alert("please enter valid Email Address")
        return false;
      }
      
      var reg=new RegExp(number);
      if (!reg.test(document.getElementById("number").value)) {
        alert("please enter valid mobile number")
        return false;
      }

      var reg=new RegExp(p);
      if (!reg.test(document.getElementById("password").value)) {
        alert("please enter at least six characters")
        return false;
      }

    var password = document.getElementById("password").value;
     var  cp = document.getElementById("confermpassword").value;

       if (password != cp) {
        
        alert("please enter same password ")
        return false;
        }
      
      return ;
    }


  </script>

</head>

<body text=white>
  <div class="bg-text">
    <form action="php/basic_updated.php" onsubmit="return V()" method="POST">
      <table align=center cellspacing=5>
        <tr>
          <td colspan=2>

            <h2 align=center> Registration Form</h2>
            <hr>
            <br>
          </td>
        </tr>


        <tr>
          <td>
            <label >First Name</label>
          </td>
          <td>
            <input type="text" id="fname" name="FirstName" required placeholder=" First name">
          </td>
        </tr>

        <tr>
          <td>

            <label >
              <font>Last Name</font>
            </label>
          </td>
          <td>
            <input type="text" id="lname" name="LastName" required placeholder=" Last name">

          </td>
        </tr>

        <tr>
          <td>

            <label >
              <font>Email-id</font>
            </label>
          </td>
          <td>
            <input type="text" id="email" name="Email-id"  required placeholder=" abc@gmail.com">

          </td>
        </tr>

        <tr>
          <td>

            <label >
              <font>Mobile Number</font>
            </label>
          </td>
          <td>
            <input type="number"  id="number" name="MobileNumber" required placeholder=" 10-digit Mobile Number">
          </td>
        </tr>

        <tr>
          <td>

            <label >Create Password</label>
          </td>
          <td>
            <input type="Password" id="password" placeholder=" Password" name="CreatePassword">
          </td>
        </tr>

        <tr>
          <td>
            <label>Confirm Password</label>
          </td>
          <td>
            <input type="Password"  id=confermpassword placeholder=" Password" name="ConfirmPassword">
          </td>
        </tr>


        <tr>
          <td colspan=2 align="center">
            <br>
            <input   type="submit" style="width: 100px; border-radius: 70px;      "></input>
          </td>
        </tr>

        <tr>
          <td><br></td>
        </tr>

        <tr>
          <td align=center colspan=2>
            <font size=3> <a href="1.php">Already have User-id & Password</a></font>
          </td>

        </tr>
      </table>
    </form>
    <br>
    <br>
    <br>
    <br>
  </div>
  </div>

</body>

</html>