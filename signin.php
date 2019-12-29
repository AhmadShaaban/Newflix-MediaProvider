
<?php
	//require('config/config.php');
	//require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');
    require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');
    
    

    session_start();

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    
    
        

	if (isset($_POST['submit'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
        
//        echo $email;
        
		
        //$query1 = "SELECT COUNT(email) FROM users WHERE email =".$email;
        $query1 = 'SELECT COUNT(*) as total FROM users WHERE email = "' .$email. '" and password = "' .$password. '" and isadmin=1 ';
        
        $result = mysqli_query($conn, $query1);
        //echo $query1;
        $data=mysqli_fetch_assoc($result);
        $isadmin = $data['total'];
        
        $query1 = 'SELECT COUNT(*) as total FROM users WHERE email = "' .$email. '" and password = "' .$password. '" ';
        
        $result = mysqli_query($conn, $query1);
        //echo $query1;
        $data=mysqli_fetch_assoc($result);
        //echo $data['total'];
        
        if ($data['total'] == 1){
            
            /*$query1 = 'SELECT COUNT(*) as total2 FROM users WHERE email = "' .$email. '" and password = "' .$password. '" and isadmin ='.$isadmin ;
            
            $result = mysqli_query($conn, $query1);
            //echo $query1;
            $data=mysqli_fetch_assoc($result);
            echo $query1;*/
            //echo $data['total'];
            //Admin = 1 , user = 2
            if ($isadmin == 1){
                $_SESSION['flag'] = 1;
                header('Location: adminpage.php');
            }
            else {
                $_SESSION['flag'] = 2;
                header('Location: home.php');
            } 
            
        }
        
        else {
            // not signed up
           
           header('Location: wrongpass.php');

        }
        
		
	}
else {

}

    
?>



<?php include('header.php'); ?>



<div class="d-flex justify-content-around align-items-center h-100vh text-center">
            <div class="w-50">
                <div class="logo m-auto">
                    <img src="images/logo2.png" class="w-100" alt="">
                </div>
                <p class="signup-call-to-action">Signin &amp; chill!</p>

                <form method="POST" class="signup-form" action="" >

                    <div class="signup-fail alert alert-danger display-none">
                        Make sure you filled up all the below feilds properly.
                    </div>

                    <div class="email">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" pattern="[^ @]*@[^ @]*" placeholder="e.g: ahmad@yahoo.com">
                    </div>

                    <div class="password">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="more than 5 characters">
                    </div>

                    <div class="submit">
                        <input type="submit" value="SignIn" name="submit" class="btn btn-primary my-btn submit-btn">
                    </div>
                    
                    <div class="submit">
                        <a href="signup.php"> SignUp </a>
                    </div>

                </form>
            </div>
            <div class="signup-right-bg w-50 h-100">
                
            </div>
        </div>
        



<?php include('scripts.php'); ?>

<script>
//global $, console, alert

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

  function signinValidation() {
    $(".signup-form").on("submit", function (e) {
  
      validateEmail();
      
      if (!$(".email input").val() || !$(".password input").val()) {
          e.preventDefault();
        $(".signup-fail").slideDown(0);
      }
      else {
        $(".signup-fail").slideUp(0);
      }
      
    });
  }

  signinValidation();
    
});
</script>

 
<?php include('footer.php'); ?>