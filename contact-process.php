<<<<<<< HEAD
<?php

use google\appengine\api\mail\Message;
use google\appengine\api\users\User;
use google\appengine\api\users\UserService;


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$emailTo = 'vikas@360digitaltransformation.com'; // Change with your Email address
$contactSubject = 'Contact Form Website'; // Change Subject




// SECOND:
// save this file, and close it. Thank you!


$contactName = $contactEmail = $contactMessage = "";

$contactName = test_input($_POST["contactName"]);


if (trim($_POST['contactEmail']) === '') {
    $emailError = 'Forgot to enter in your e-mail address.';
    $hasError = true;
} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['contactEmail']))) {
    $emailError = 'You entered an invalid email address.';
    $hasError = true;
} else {
    $contactEmail = test_input($_POST['contactEmail']);
}

$contactSubject = test_input($_POST["contactSubject"]);

$contactMessage = isset($_POST["contactMessage"]) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", test_input($_POST['contactMessage'])) : "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$body_form = "Name: $contactName\nEmail: $contactEmail\nSubject: $contactSubject\nMessage: $contactMessage";


try {

    $message = new Message();
    $message->setSender('trainings.360.dt@gmail.com');
    $message->addTo('vikas@360digitaltransformation.com');
    $message->setSubject('360DT- Contact form');
    $message->setTextBody($body_form);
    $message->send();

    // header("Location: /mail_sent");

} catch (InvalidArgumentException $e) {

    $error = "Unable to send mail. $e";
}
=======
<?php

use google\appengine\api\mail\Message;

// Set email configuration
$emailTo = 'manishguptaa33@gmail.com'; // Change with your Email address

// Get form data (make sure to sanitize and validate user inputs)
$contactName = isset($_POST["contactName"]) ? $_POST["contactName"] : "";
$contactPhone = isset($_POST["contactPhone"]) ? $_POST["contactPhone"] : "";
$contactEmail = isset($_POST["contactEmail"]) ? $_POST["contactEmail"] : "";
$contactMessage = isset($_POST["contactMessage"]) ? $_POST["contactMessage"] : "";

// Validate email
if (empty($contactEmail) || !filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address.');
}

// If no validation errors, proceed to send the email
try {
    // Create a new Message
    $message = new Message();

    // Set sender and recipient
    $message->setSender($emailTo);
    $message->addTo($contactEmail);

    // Set email subject
    $message->setSubject('TrainoMart - Contact form');

    // Set email body (HTML content)
    $body = "Name: $contactName<br>Phone: $contactPhone<br>Email: $contactEmail<br>Message: $contactMessage";
    $message->setHtmlBody($body);

    // Send the email
    $message->send();

    // Display an alert using JavaScript
    echo '<script>';
    echo 'alert("Email has been sent successfully");';
    echo 'window.location.href = "index.html";';  // Redirect to index.html
    echo '</script>';
} catch (Exception $e) {
    // Handle the exception and display an error message
    echo '<script>alert("Unable to send mail. Error: ' . $e->getMessage() . '");</script>';
}
>>>>>>> 6f1314b29e421f17c1b49383418ca460b1d71b0a
?>