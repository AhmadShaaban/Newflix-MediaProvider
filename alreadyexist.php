<?php
	//require('config/config.php');
	//require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');
    require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');
    
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
        echo $email;
        
        if ($data['total'] == 1){
            
            //Email already Exist
            header('Location: alreadyexist.php');
        }
        
        
		$query = "INSERT INTO users(name, email,age,password) 
        VALUES('$name', '$email', '$age','$password')";

		if(mysqli_query($conn, $query)){
			header('Location: home.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<?php include('header.php'); ?>

 <div class="d-flex justify-content-around align-items-center h-100vh text-center">
            <div class="w-50">
                <div class="logo m-auto">
                    <img src="images/logo.png" class="w-100" alt="">
                </div>
                <p class="signup-call-to-action">Signup &amp; chill!</p>

                <form method="post" class="signup-form" action="">

                    <div class="signup-fail alert alert-danger">
                        Sorry, Email already Exist
                    </div>

                    <div class="full-name">
                        <label for="full-name">Full name</label>
                        <input type="text" name="name" placeholder="You full name">
                    </div>

                    <div class="email">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" pattern="[^ @]*@[^ @]*" placeholder="e.g: ahmad@yahoo.com">
                    </div>

                    <div class="password">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="more than 5 characters">
                    </div>

                    <div class="age">
                        <label for="age">Age</label>
                        <input type="number" name="age">
                    </div>

                    <div class="submit">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary my-btn submit-btn">
                    </div>

                </form>
            </div>
            <div class="signup-right-bg w-50 h-100">
                
            </div>
        </div>

<?php include('scripts.php'); ?>

<script>

    /*global $, console, alert*/

$(document).ready(function () {
  "use strict";

  function validateEmailRe(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  
  function validateEmail() {
    var $result = $(".signup-form .signup-fail");
    var email = $(".email input").val();
  
    if (validateEmailRe(email)) {
      $result.slideUp(0);
    } else {
      $result.slideDown(0);
    }
  }

  $(".signup-form").on("submit", function (e) {
    

    validateEmail();
    
    function signupValidation() {
    
      if (!$(".full-name input").val() || !$(".email input").val() || !$(".password input").val() || !$(".age input").val()) {
          e.preventDefault();
        $(".signup-fail").slideDown(0);
      }
      else {
        $(".signup-fail").slideUp(0);
      }
    }

    signupValidation();
    
  });
    
});

</script>

<?php include('footer.php'); ?>