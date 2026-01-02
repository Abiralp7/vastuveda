<?php
// send-consult.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Get form data
    $full_name = htmlspecialchars($_POST['full_name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $project_location = htmlspecialchars($_POST['project_location']);
    $area = htmlspecialchars($_POST['area']);
    $project_type = htmlspecialchars($_POST['project_type']);
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "None";
    $budget = htmlspecialchars($_POST['budget']);
    $timeline = htmlspecialchars($_POST['timeline']);
    $message = htmlspecialchars($_POST['message']);

    // 2. Prepare email to business
    $to = "contact@vastuvedadesigns.com"; // Your email
    $subject = "New Consultation Request from $full_name";
    $body = "
Name: $full_name
Phone: $phone
Email: $email
Project Location: $project_location
Area: $area
Project Type: $project_type
Services: $services
Budget: $budget
Timeline: $timeline
Message: $message
";
    $headers = "From: $email\r\nReply-To: $email";

    mail($to, $subject, $body, $headers);

    // 3. Send thank-you email to client
    $client_subject = "Thank you for consulting with VastuVeda Designs!";
    $client_body = "
Hi $full_name,

Thank you for requesting a design consultation with VastuVeda Designs. 
We have received your details and will get in touch with you shortly.

Best Regards,
VastuVeda Designs
";
    $client_headers = "From: contact@vastuvedadesigns.com\r\n";

    mail($email, $client_subject, $client_body, $client_headers);

    // 4. Redirect to thank-you page
    header("Location: thankyou.html");
    exit();
}
?>
