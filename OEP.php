  <?php session_start(); ?>
  <!doctype html>
  <html lang="en">

  <head>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link href="bootstrap-4.4.1-dist/css/style.css" rel="stylesheet" id="bootstrap-css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="new.css">

  	<title> E-Library</title>

  	<script>
  		function A() {
  			alert("login Reqired For Download Book")

  		}
  	</script>



  </head>

  <body>



  	<header>
  		<b>
  			<nav style="background:linear-gradient(skyblue,white);" class="navbar navbar-expand-lg navbar-light bg-dark   fixed-top ">
  				<a class="navbar-brand " style="color:darkred">E-Library</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  					<span class="navbar-toggler-icon"></span>
  				</button>

  				<div class="collapse navbar-collapse" id="navbarSupportedContent">
  					<ul class="navbar-nav mr-auto">
  						<li class="nav-item active">
  							<a class="nav-link " style="color: black" href="OEP.php">Home <span class="sr-only">(current)</span></a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" style="color: black" href="upload.php">Upload</a>
  						</li>
  						<li class="nav-item dropdown">
  							<a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  								Books
  							</a>
  							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
  								<a class="dropdown-item" href="T.php">Thriller</a>
  								<a class="dropdown-item" href="RO.php">Romance</a>
  								<a class="dropdown-item" href="BI.php">Biography</a>
  								<a class="dropdown-item" href="HO.php">Horror</a>
  								<a class="dropdown-item" href="SC.php">Science Fiction</a>
  								<a class="dropdown-item" href="MY.php">Mythology</a>
  								<a class="dropdown-item" href="SH.php">Short story</a>
  								<a class="dropdown-item" href="P.php">Political Fiction</a>
  								<a class="dropdown-item" href="MA.php">Mathematical Fiction</a>

  						</li>

  					</ul>
  					<form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
  						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search By Book Name" name="search" required>
  						<button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: black">Search</button>
  					</form>

  					<?php
						if (empty($_SESSION["username"])) { ?>
  						<a class="nav-link text-white " href="1.php"><img src="image/login.png" height=50% width=50%></img>
  							<font size=3 color=black>Login</font>
  						</a>
  					<?php } else { ?>

  						<a class="nav-link " href="php/logout.php"><img src="image/logout.png" height=50% width=50%></img>
  							<font size=3 color=black><?php echo ' ' . $_SESSION['username'] . ' ' ?> </font>
  						</a>
  					<?php	 } ?>


  				</div>
  			</nav>

  		</b>
  	</header>



  	<div>

  		<img src="hello.jpg" width="100%" height="770px"></img>


  	</div>
  	<br><br>

  	<?php
		$conn = mysqli_connect("localhost", "root", "", "library") or die(" not connected");
		$a = "Thriller";

		$query = $conn->query("SELECT * FROM book  ORDER BY upload_on DESC");
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$s=$row["b_type"];
				$imageURL = 'php/upload/'.$s.'/' . $row["i_name"];
				$FileURL = 'php/upload/' .$s.'/'. $row["f_name"];
				$BookName = $row["b_name"];
				$BookAuthor = $row["b_author"];
				$type = $row["b_type"];
				$time = $row["upload_on"];


		?>
  			<div class="card mb-3  " style="max-width: 700px;">
  				<div class="row no-gutters">
  					<div class="col-md-6">
  						<?php
							if (!empty($_SESSION["username"])) { ?>
  							<a href="<?php echo $FileURL; ?>"><img src="<?php echo $imageURL; ?>" width="330px" height="200px"></img></a>
  						<?php } else { ?>
  							<a onclick="A()" href="1.php"><img src="<?php echo $imageURL; ?>" width="350px" height="232px"></img></a>

  						<?php } ?>
  					</div>
  					<div class="col-md-6">
  						<div class="card-body">
  							<p class="card-text">
  								Book-Name:<?php echo $BookName; ?><br><br>
  								Author:<?php echo $BookAuthor; ?><br /><br>
  								<?php
									if (!empty($_SESSION["username"])) { ?>
  									Download:<a href="<?php echo $FileURL; ?>">Click me</a><br /><br>
  								<?php } else { ?>
  									Download:<a onclick="A()" href="1.php">Click me</a><br /><br>
  								<?php } ?>
  								Published-on:<?php echo $time; ?><br /><br>
  							</p>
  						</div>
  					</div>
  				</div>
  			</div>
  		<?php }
		} else { ?>
  		<p>No Data found...</p>
  	<?php } ?>


<!-- Footer -->
<section style="background:linear-gradient(skyblue,white);">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-md-6">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links" >
						<a href="OEP.php"><i class="fa fa-angle-double-right"></i>&nbsp &nbsp <u>Home</u>&nbsp &nbsp </a>
						<a href="footer/inforamation.html"><i class="fa fa-angle-double-right"></i>&nbsp &nbsp <u>Information and Steps</u>&nbsp &nbsp </a>
            <a href="1.php"><i class="fa fa-angle-double-right"></i>&nbsp &nbsp <u>Get Started</u>&nbsp &nbsp </a>
            <a href="footer/aboutus.html"><i class="fa fa-angle-double-right"></i>&nbsp &nbsp <u>About us</u> </a>
          
					</ul>
        </div>
          

        &nbsp &nbsp<div class="col-md-20">
					<h5>Social Media links</h5>
          <ul class="list-unstyled list-inline social text-center"><a  class="fa fa-angle-double-right">&nbsp &nbsp</a>
						<li class="list-inline-item" ><a href="https://www.facebook.com/K.win.5522"><img src="image/facebook.png" height="70%" width="70%"></img></li>
						<li class="list-inline-item"><a href="https://twitter.com"><img src="image/twitter.png" height="70%" width="70%"></img></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/abhi_sondagar_/"><img src="image/insta.png" height="70%" width="70%"></img></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/rutvik_surani99/"><img src="image/google.png" height="70%" width="70%"></img></a></li>
						<li class="list-inline-item"><a href="https://www.gmail.com" target="_blank"><img src="image/gmail.png" height="70%" width="70%"></img></a></li>
					</ul>
				</div>
        
      
     
				
			</div>	
		</div>
	</section>









  	<!-- Optional JavaScript -->
  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

  </html>