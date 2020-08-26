<html>
<?php session_start(); ?>

<head>
  <link href="style.css" rel="stylesheet" type="text/css">

  <style>
    .bg-text {
      height: 70%;
      width: 30%;
      background-color: rgba(41, 30, 26, 0.57);

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

</head>
<?php
if (!empty($_SESSION["username"])) { ?>
<body text="white">
  <div class="bg-text">
    <form action="php/upload.php" method="POST" enctype="multipart/form-data">
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
            <td> <input type="file" name="file" required accept="application/pdf">
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
              <a href="OEP.php">
                <font size=3 color=red> Back To HomePage </font< /a>||<a href="Admin/Alogin.html">
                    <font size=3 color=red> Only For Admin </font< /a>


            </td>
          </tr>
        </table>
      </center>
    </form>
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
  <?php } else { 
    echo '<script>alert("You have to login first for uploading any book. ") </script>';
    echo '<script> window.location="http://localhost/WT/1.php"</script>';

   
  }?>
</body>

</html>