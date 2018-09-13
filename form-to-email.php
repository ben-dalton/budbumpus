<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$phone = $_POST['phone'];
$saddle = $_POST['saddle'];
$chaps = $_POST['chaps'];
$otherleather = $_POST['otherleather'];
$handed = $_POST['handed'];
$tree = $_POST['tree'];
$seat = $_POST['swells'];
$cantle = $_POST['cantle'];
$horn = $_POST ['horn'];
$gullet = $_POST ['gullet'];
$bars = $_POST ['bars'];
$brands = $_POST ['brands'];
$tooling = $_POST ['tooling'];
$texture = $_POST ['texture'];
$seatfeature = $_POST ['seatfeature'];
$shirttype = $_POST ['shirttype'];
$hornfeature = $_POST ['hornfeature'];
$roll = $_POST ['roll'];
$fenders = $_POST ['fenders'];
$stirruptype = $_POST ['stirruptype'];
$flankcinch = $_POST ['flankcinch'];
$frontcinch = $_POST ['frontcinch'];
$otherspecs = $_POST ['otherspecs'];
$chapdesc = $_POST ['chapdesc'];
$otherdesc = $_POST ['otherdesc'];

//Validate first
if(empty($name)||empty($phone)) 
{
    echo "Name and phone are mandatory.";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value.";
    exit;
}

$email_from = 'saddle_maker@hotmail.com';//<== update the email address
$email_subject = "Quote Request";
$email_body = "You have received a new quote request from $name.\n".
"Contact Information:
$name
$phone
$visitor_email \n".
    "The request is for \n $saddle \n $chaps \n $otherleather \n
Saddle Description
Handedness: $handed \n
Tree:$tree
Seat: $seat
Cantle: $cantle
Horn: $horn 
Gullet: $gullet
Bars: $bars
Special Brands: $brands
Tooling: $tooling
Texture: $texture
Seat: $seatfeature
Shirt: $shirttype
Horn: $hornfeature
Roll: $roll
Fenders: $fenders
Stirrups: $stirruptype
Flank Cinch: $flankcinch
Front Cinch: $frontcinch
Other Specifications:$otherspecs \n \n
Chaps/Chinks
Description: $chapdesc \n \n
Other Leatherwork
Description: $otherdesc \n \n".
    
$to = "saddle_maker@hotmail.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 