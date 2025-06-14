<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  $to = "harika@tattvainvestmentadvisory.com";
  $headers = "From: $email";
  $fullMessage = "From: $name\nEmail: $email\n\nMessage:\n$message";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Failed to send message.";
  }
}
?>
