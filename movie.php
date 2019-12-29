<?php
	
    session_start();
    if ($_SESSION['flag'] != 2 && $_SESSION['flag'] != 1){
        header('location: signin.php');
    }

	//require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');
    require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');

	// Check For Submit
	/*if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM posts WHERE id = {$delete_id}";
        
		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
    */

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM movies WHERE id ='.$id;

   
	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$movie = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie</title>

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
							<li class="menu-item current-menu-item"><a href="home.php">Home</a></li>
							<li class="menu-item"><a href="about.html">About</a></li>
                            <li class="menu-item "><a href="logout.php">Sign out</a></li>
						</ul> <!-- .menu -->

						<form action="#" class="search-form mb-0">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
                           
                            
                            <h2 >   <?php echo $movie['name']; ?> </h2>
                            <video poster="movieposters/aton.jpg" autoplay="autoplay" controls="controls" width="1100">
                            <source src="videos/aton.mp4" type="video/mp4"  />
                            </video>
                            
                            
                            
                            
							
						</div> <!-- .row -->
						
					</div>
				</div> <!-- .container -->
			</main>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>