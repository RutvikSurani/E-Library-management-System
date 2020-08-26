<html>

<head>
  <link href="../style.css" rel="stylesheet" type="text/css">

  <style>
    .bg-text {
      height: 70%;
      width: 30%;
      background-color: rgba(41, 30, 26, 0.57);

    }
    .bg{
        left:30%; 

    }
    .bg1{
        left: 70%
    }

    img {
      border: 2px solid black;
    }

    input {
      width: 250px;
    }
    
    a {
      text-decoration: none;
    }
</style>
<script>
  		function A() {
            <?php  session_destroy(); ?>

  		}
  	</script>


</head>


<body text="white">
<?php session_start(); ?>
<?php

      if (!empty($_SESSION["admin"])) 
      { ?>
  						
      <div class="bg-text bg">

    <form action="../php/aupload.php" method="POST" enctype="multipart/form-data">
      <center>
        <img id="preview" src="#" width="230px" height="250px" /><br />
        <input type="file" id="image" name=image style="display: none;" accept="image/jpeg ,image/jpg, image/png" />
        <a href="javascript:changeProfile()">Upload</a> |
        <a style="color: red" href="javascript:removeImage()">Remove</a><br><br>

        <table align=center cellspacing=5>

          <tr>
            <td>
              <label>Book Name</label>
            </td>
            <td>
              <input type="text" name="BookName" required placeholder=" Book name">
            </td>
          </tr>

          <tr>
            <td>

              <label>
                <font>Author Name</font>
              </label>
            </td>
            <td>
              <input type="text" name="AuthorName" required placeholder=" Author Name">

            </td>
          </tr>

          <tr>
            <td>

              <label>
                <font>Book-type</font>
              </label>
            </td>
            <td>
              <select name="Type" required aria-placeholder="Select type">
                <option>Thriller</option>
                <option> Romance</option>
                <option> Biography</option>
                <option>Horror</option>
                <option>ScienceFiction</option>
                <option>Mythology</option>
                <option>ShortStory</option>
                <option>Political</option>
                <option> Mathematical</option>
              </select>

            </td>
          </tr>

          <tr>
            <td>

              <label>
                <font>Book Price</font>
              </label>
            </td>
            <td>
              <input type="number" name="Price" required placeholder="Price of Book">
            </td>
          </tr>
          <tr>
            <td> File:

            </td>
            <td> <input type="file" name="file" required  accept="application/pdf">
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="submit"
                style="width: 100px; border-radius: 70px; background-color: skyblue;"></input>
            </td>
          </tr>
          <tr>
            <td>
              </td>
            </tr>
          <tr>
            <td colspan="2" align="center">
              <a href="../php/logout.php"><font size=3 color=red onclick="A()">  Back To HomePage </font</a>


            </td>
          </tr>



        </table>





      </center>
    </form>
  </div>
  </div>


  <div class="bg-text bg1">
    <form action="../php/delete.php" method="POST" enctype="multipart/form-data">
      <center>
       
  <font color=red> <h1 color> For Deleat Record </font></h1>
        <table align=center cellspacing=5>

          <tr>
            <td>
              <label>Book Name</label>
            </td>
            <td>
              <input type="text" name="BookName" required placeholder=" Book name">
            </td>
          </tr>
          <tr>
            <td>

              <label>
                <font>Book-type</font>
              </label>
            </td>
            <td>
              <select name="Type" required aria-placeholder="Select type">
                <option>Thriller</option>
                <option> Romance</option>
                <option> Biography</option>
                <option>Horror</option>
                <option>ScienceFiction</option>
                <option>Mythology</option>
                <option>ShortStory</option>
                <option>Political</option>
                <option> Mathematical</option>
              </select>

            </td>
          </tr>

          <tr>
            <td>

            
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="submit" value="Delete"
                style="width: 100px; border-radius: 70px; background-color: skyblue;"></input>
            </td>
          </tr>
          <tr>
            <td>
              </td>
            </tr>
          <tr>
            <td colspan="2" align="center">
              <a href="../OEP.php"><font size=3 color=red onclick="A()">  Back To HomePage </font</a>


            </td>
          </tr>



        </table>





      </center>
    </form>
  </div>
  </div>


 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    function changeProfile() {
      $('#image').click();
    }
    $('#image').change(function () {
      var imgPath = this.value;
      var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
      if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        readURL(this);
      else
        alert("Please select image file (jpg, jpeg, png).")
    });
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
        };
      }
    }
    function removeImage() {
      $('#preview').attr('src', 'noimage.jpg');
    }
  </script>

<?php } 
else { ?>
    <?php echo '<script> alert("Login Required ")</script>';
    echo '<script> window.location="http://localhost/WT/Admin/Alogin.html"</script>';

    ?>
    <?php } ?>



</body>

</html>