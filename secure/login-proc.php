<?php
require 'database-connection.php';
require 'functions.php';
    //checking for inputs from user
  if (isset($_POST['submit']))
      {
    //check the emptiness	  
  	if (empty($_POST['username']) OR empty($_POST['password']))
            {
    ?>
    <script type="text/javascript">
	alert("Please, fill all Required Fields");
	history.back();
	</script>
    <?php 	
	exit();
            }
//Declear Variables
  		$emailAddress = testInput($_POST["username"]);
                $password = md5($_POST["password"]);
 //check email address
    validateEmailAddress($emailAddress);
    
//checking username from Accounts
$sqlAcc = "SELECT * FROM accounts WHERE emailAddress = '".$emailAddress."' AND password = '".$password."' ";
    if (!$resultAcc = $mysqli->query($sqlAcc)) {
	?>
    <script type="text/javascript">
	alert("Sorry, Account Authentication Failed");
	history.back();
	</script>
    <?php 	
	exit();
} 
if ($resultAcc->num_rows == 0) {
	?>
    <script type="text/javascript">
	alert("Sorry, Account Not Active");
	history.back();
	</script>
    <?php 	
	exit();			
}
}