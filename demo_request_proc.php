<?php
//checking for inputs from user
if (isset($_POST['submit'])){
    //check the emptiness	  
    if (empty($_POST['emailAddress']) || empty($_POST['fullName']))
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
    $emailAddress = $_POST["emailAddress"];
    $fullName = $_POST['fullName'];
    $adminEmail1 = "info@reverton.net";
    $adminEmail2 = "jvnnamani@reverton.net";
    $subject = "SmartStore Demo Request";
    $senderEmail = "info@234market.com";
    $headers = "From: ".$senderEmail."\r\n".
               "X-Mailer: PHP/" . phpversion();
    $message = "Dear Admin, \n\nA Prospect has requested for SmartStore Demo Details \n\nName: $fullName, \n\nEmail Address: $emailAddress \n\nThanks";

    mail($adminEmail1, $subject, $message, $headers);
    mail($adminEmail2, $subject, $message, $headers);			
     echo '<script type="text/javascript">
         alert("Your request has been submitted \n\nYou will be contacted shortly\n\nThanks");
	window.location.href="index.html";
	</script>'; 
    exit();
} else {
    echo '<script type="text/javascript">
	history.back();
	</script>'; 
    exit();
}