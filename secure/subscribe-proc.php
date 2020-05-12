<?php
require 'database-connection.php';
require 'functions.php';
    //checking for inputs from user
  if (isset($_POST['submit']))
      {
    //check the emptiness	  
  	if (empty($_POST['businessName']) OR empty($_POST['businessAddress']) OR empty($_POST['phoneNumber']) 
                OR empty($_POST['emailAddress'])  OR empty($_POST['principalOfficerName'])  OR empty($_POST['subscriptionType']))
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
  		$businessName = testInput($_POST["businessName"]);
                $businessAddress = testInput($_POST['businessAddress']);
  		$phoneNumber = testInput($_POST["phoneNumber"]);
                $emailAddress = testInput($_POST['emailAddress']);
  		$principalOfficerName = testInput($_POST["principalOfficerName"]);
                $subscriptionType = testInput($_POST['subscriptionType']);
                $password = md5(rand(200000, 900000));
 //check email address
    validateEmailAddress($emailAddress);
 //check phone Number
    validatePhoneNumber($phoneNumber);
    
//checking username from Accounts
$sqlAcc = "SELECT * FROM accounts WHERE emailAddress = '".$emailAddress."' ";
    if (!$resultAcc = $mysqli->query($sqlAcc)) {
	?>
    <script type="text/javascript">
	alert("Sorry, Account Authentication Failed");
	history.back();
	</script>
    <?php 	
	exit();
} 
if ($resultAcc->num_rows == 1) {
	?>
    <script type="text/javascript">
	alert("Sorry, Double Registration not Allowed");
	history.back();
	</script>
    <?php 	
	exit();			
}

$IPaddress = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Africa/Lagos");
$mytime = time(12);
$dateTime = date("j-M-Y h:i:s a",$mytime);
// Create Accounts
$sqlInsert = "INSERT INTO accounts (businessName, businessAddress, phoneNumber, emailAddress, principalOfficerName, subscriptionType, password,IPaddress)"
        . " VALUES "
        . "('$businessName', '$businessAddress', '$phoneNumber', '$emailAddress', '$principalOfficerName', '$subscriptionType', '$password', '$IPaddress')";
if (!$resultInsert = $mysqli->query($sqlInsert)) {
    ?>
    <script type="text/javascript">
	alert("Sorry, Account Creation Failed");
	history.back();
	</script>
    <?php 
exit();
}else {
$receiverEmail = "jvnnamani@reverton.net";
$subject = "Smartstore Subscription";
$senderEmail = "info@234market.com";
$headers = "From: ".$senderEmail."\r\n".
           "X-Mailer: PHP/" . phpversion();
           $message = "Dear Admin, \n\nA subscription for Smartstore has been submitted by $principalOfficerName\n\n"
                   ."Kindly set up the configuration and send details to the client \n\n"
                   . "Thanks";

mail($receiverEmail, $subject, $message, $headers);
    //Echo a success message and redirect
        echo '
      <script type="text/javascript">
      alert("Account Successfully Created");
        window.location.href="../subscribe-success.php?em='.$emailAddress.'&n='.$principalOfficerName.'&am='.$subscriptionType.'&pn='.$phoneNumber.'";
      </script>';

	}
}