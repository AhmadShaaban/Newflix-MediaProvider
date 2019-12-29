<?php
	//require('config/config.php');
	require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');

      
        
    
    
	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$email = $_POST['email'];
		$password = $_POST['password'];
		
        //$query1 = "SELECT COUNT(email) FROM users WHERE email =".$email;
        
        $query1 = 'SELECT COUNT(*) as total FROM users WHERE email = "' .$email. '" and password = "' .$password. '" ';
        $result = mysqli_query($conn, $query1);
        //echo $query1;
        $data=mysqli_fetch_assoc($result);
        //echo $data['total'];
        
        if ($data['total'] == 1){
            
            //USER LOGIN APRROVED
        }
        
        else {
            //USER NOT FOUND
        }
        
		
	}
?>