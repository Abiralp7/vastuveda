<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Get form data
    $full_name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $project_location = htmlspecialchars($_POST['project_location']);
    $service_type = htmlspecialchars($_POST['service_type']);
    $message_content = htmlspecialchars($_POST['message']);

    // 2. Prepare email to business
    $to = "contact@vastuvedadesigns.com";
    $subject = "New Inquiry – VastuVeda Designs";
    $body = "New project inquiry received:\n\n" .
        "Full Name: $full_name\n" .
        "Email: $email\n" .
        "Phone: $phone\n" .
        "Project Location: $project_location\n" .
        "Type of Service: $service_type\n\n" .
        "Message:\n$message_content";

    $headers = "From: $email\r\nReply-To: $email";

    mail($to, $subject, $body, $headers);

    // 3. Send thank-you email to client
    $client_subject = "Thank you for contacting VastuVeda Designs!";
    $client_body = "Hi $full_name,\n\nThank you for contacting VastuVeda Designs. 
We have received your details and will get in touch with you shortly.\n\nBest Regards,\nVastuVeda Designs";

    $client_headers = "From: contact@vastuvedadesigns.com\r\n";

    mail($email, $client_subject, $client_body, $client_headers);

    // 4. Redirect to thank-you page
    header("Location: thankyou.html");
    exit();
}
?>
