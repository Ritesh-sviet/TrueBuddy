<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $subject = test_input($_POST["subject"]);
  $message = test_input($_POST["message"]);

  // Set the recipient email address
  $to = "contact@truebuddy.com";

  // Set the email subject and message
  $email_subject = "New Contact Form Submission - True Buddy";
  $email_message = "Name: $name\n";
  $email_message .= "Email: $email\n";
  $email_message .= "Subject: $subject\n";
  $email_message .= "Message: $message\n";

  // Set the email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";

  // Send the email
  if (mail($to, $email_subject, $email_message, $headers)) {
    // If the email was sent successfully, redirect to a thank-you page
    header("Location: thankyou.html");
    exit;
  } else {
    // If there was an error sending the email, display an error message
    echo "There was an error sending your message. Please try again.";
  }
}

// Function to sanitize form data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
