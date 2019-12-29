<?php
	//require('config/config.php');
	//require('C:\xampp\htdocs\phpsandbox\tmplt1\config\dp.php');
    require('C:\xampp\htdocs\phpsandbox\finalproject\dp.php');
    session_start();

    if ($_SESSION['flag'] != 1){
        header('location: home.php');
    }
    
    // Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$selected = $_POST['optradio'];
        $name = $_POST['moviename'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $imagepath = $_POST['imagepath'];
		echo $selected;
        //DELETE FROM table_name WHERE condition;
        
        if ($selected == "delete"){
            $query1 = 'DELETE FROM `movies` WHERE `name` = "'.$name.'"';
            $result = mysqli_query($conn, $query1);
        }
        else if ($selected == "add"){
            $query1 = 'INSERT INTO movies(name,genre,year,imagepath) VALUES("'.$name.'", "'.$genre.'" , "'.$year.'" , "'.$imagepath.'" )' ;
            $result = mysqli_query($conn, $query1);
        }
        else{
            
            $query1 = 'DELETE FROM `movies` WHERE `name` = "'.$name.'"';
            $result = mysqli_query($conn, $query1);
            $query1 = 'INSERT INTO movies(name,genre,year,imagepath) VALUES("'.$name.'", "'.$genre.'" , "'.$year.'" , "'.$imagepath.'" )' ;
            $result = mysqli_query($conn, $query1);
        }
      
	}
    
?>

<?php include('header.php'); ?>

 <div class="d-flex justify-content-around align-items-center h-100vh text-center">
            <div class="w-50">
                <div class="logo m-auto">
                    <a href="home.php" id="branding">
						<img src="images/logo.png"  class="w-100">
					</a> 
               
                </div>
                <p class="signup-call-to-action">Edit!</p>

                <form method="post" class="signup-form" onsubmit="return validateForm()" name="myForm" action="">
                  
                    
                    <div class="radio">
                    <label><input id="add" type="radio" value="add" name="optradio"  onclick="DeleteChecked()" checked >Add</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" value="edit" name="optradio" onclick="DeleteChecked()" >Edit</label>
                    </div>
                    <div class="radio">
                      <label><input id = "delete" value="delete" type="radio" name="optradio" onclick="DeleteChecked()">Delete</label>
                    </div>
                
                
                    <div class="edit-fail alert alert-danger display-none">
                        Make sure you filled up at least Movie Name
                    </div>

                    <div class="full-name" >
                        <label for="full-name">Movie Name</label>
                        <input type="text" name="moviename" placeholder="Movie Name">
                    </div>

                    <div class="tito full-name">
                        <label for="email">genre</label>
                        <input type="text" name="genre" placeholder="e.g: Drama">
                    </div>
                    
                    <div class="tito full-name">
                        <label for="email">year</label>
                        <input type="text" name="year"  placeholder="e.g: 2018">
                    </div>
                    
                    <div class="tito full-name">
                        <label for="email">image path</label>
                        <input type="text" name="imagepath"  placeholder="e.g: movieposters/x.jpg">
                    </div>
                    
                    <div class="full-name tito">
                        <label for="email">video path</label>
                        <input type="text" name="email"  placeholder="e.g: videos/x.jpg">
                    </div>
                    


                    <div class="submit">
                        <input type="submit" value="Submit" name="submit"  class="btn btn-primary my-btn submit-btn">
                    </div>

                </form>
            </div>
            <div class="signup-right-bg w-50 h-100">
                
            </div>
        </div>

<?php include('scripts.php'); ?>

<script>

    /*global $, console, alert*/

function DeleteChecked()
{
    var x = document.getElementById("delete").checked;
    if (x){
        $(".tito").slideUp();
    }
    else {
         $(".tito").slideDown();
        
    }
}
    
    function validateForm() 
    {
    var x = document.forms["myForm"]["moviename"].value;
    
    if (x == "") {
        alert("Name must be filled out");
        //$(".edit-fail").slideDown(0);
        return false;
    }
    //return true;
}
    
    
    
    

    

</script>

<?php include('footer.php'); ?>