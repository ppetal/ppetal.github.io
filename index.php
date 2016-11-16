<?php 
if (isset($_REQUEST['submit'])) {
  $errors = array();

  if (!empty($_REQUEST['name'])) {
  $name = $_REQUEST['name'];
  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";
  if (preg_match($pattern,$name)){ $name = $_REQUEST['name'];}
  else{ $errors[] = 'Your Name can only contain _, 1-9, A-Z or a-z 2-20 long.';}
  } else {$errors[] = 'You forgot to enter your Name.';}
  
  $email = test_input($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
  }

  if (empty($_POST["message"])) {
  $message = "";
  } else {
  $message = test_input($_POST["message"]);
  }
  }
 
if (isset($_REQUEST['submit'])) {
  if (empty($errors)) { 
  $from = "From: Platform Petal"; 
  $to = "platformpetal@gmail.com"; 
  $subject = "Message from " . $name . "";
  
  $message = "Message from " . $name . " 
  Email: " . $email . " 
  Message: " . $message ."";
  mail($to,$subject,$message,$from);
  }
}

if (isset($_REQUEST['submit'])) {
if (!empty($errors)) { 
echo '<hr /><h3>The following occurred:</h3><ul>'; 
foreach ($errors as $msg) { echo '<li>'. $msg . '</li>';}
echo '</ul><h3>Your mail could not be sent due to input errors.</h3><hr />';}
else{echo '<hr /><h3 align="center">Your mail was sent. Thank you!</h3><hr />'; 
}
}

?>