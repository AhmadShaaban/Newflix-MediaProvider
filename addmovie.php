<?php
	
	require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $imagepath = $_POST['imagepath'];
        $videopath = $_POST['videopath'];
		
		$query = "INSERT INTO movies(name,genre,year,imagepath,videopath) 
        VALUES('$name', '$genre', '$year','$imagepath','$videopath')";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>