<?php 

session_start();
if ($_SESSION['flag'] != 2 && $_SESSION['flag'] != 1){
        header('location: signin.php');
    }

//require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');
require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');
$query = 'SELECT * FROM movies ';
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movies</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="tmp/style.css">
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="home.php" id="branding">
						<img src="images/logo.png" alt="" class="logo" width="300">
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
							<li class="menu-item"><a href="about.html">About</a></li>
                            <li class="menu-item "><a href="logout.php">Sign out</a></li>
						</ul> <!-- .menu -->
                        
						<form  method="GET" action="searchresults.php" class="">
							<input  type="text" name="text" placeholder="Search...">
                            
                            <div class="submit">
                                <input type="submit" value="Search" name="submit" class="btn btn-primary my-btn submit-btn">
                            </div>
						</form>
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
                           
                            
                            
                            <?php foreach($movies as $movie) : ?>
			                     
                                <div class="col-sm-6 col-md-3">
								    <div class="latest-movie">
                                        
                                        <a href="<?php echo ""; ?>movie.php?id=<?php echo $movie['id']; ?> " class="movie-link"><img src="<?php echo $movie['imagepath']?>" class="movie-img" alt="Movie 3">
                                        <span class="movie-link-text"><?php echo $movie['name']; ?></span>
                                        </a>
                                        <small class="movie-desc"> <?php echo $movie['genre'];  ?> <br>  <?php echo $movie['year']; ?></small>
                                    </div>
							</div>
		                      <?php endforeach; ?>
                            
                            
                            
							
						</div> <!-- .row -->
						
					</div>
				</div> <!-- .container -->
			</main>
		</div>
		<!-- Default snippet for navigation -->
		
        <script>
        function fun(){
            window.location.replace("searchresults.php");
        }
        
        </script>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>