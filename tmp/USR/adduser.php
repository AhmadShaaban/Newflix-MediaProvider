<?php
	//require('config/config.php');
	require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');

    
    
    
    
    
	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$email = $_POST['email'];
		$password = $_POST['password'];
		$age =$_POST['age'];
        $name =$_POST['name'];
        //$query1 = "SELECT COUNT(email) FROM users WHERE email =".$email;
        
        $query1 = 'SELECT COUNT(email) as total FROM users WHERE email = "'.$email.' "';
        $result = mysqli_query($conn, $query1);
        $data=mysqli_fetch_assoc($result);
        //echo $data['total'];
        
        if ($data['total'] == 1){
            
            //Email already Exist
        }
        
        
		$query = "INSERT INTO users(name, email,age,password) 
        VALUES('$name', '$email', '$age','$password')";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>