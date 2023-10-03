<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $senderName = $_POST["senderName"];
    $senderEmail = $_POST["senderEmail"];
    $recipientEmail = $_POST["recipientEmail"];
    $subject = $_POST["subject"];
    $message = nl2br($_POST["message"]); // Convert newlines to HTML line breaks

    // Additional headers
    $headers = "From: $senderName <$senderEmail>\r\n";
    $headers .= "Reply-To: $senderEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    // Send email
    if (mail($recipientEmail, $subject, $message, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Email failed to send";
    }
}
?>
