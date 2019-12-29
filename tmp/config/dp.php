<?php
	// Create Connection
	$conn = mysqli_connect('localhost','root','123456','project');

	// Check Connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}
    
    else {
        //echo 'success';
    }