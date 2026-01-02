<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $jobpost = htmlspecialchars($_POST['jobpost']);
    $experience = htmlspecialchars($_POST['experience']);

    // Email to your business
    $to = "careers@vastuvedadesigns.com"; // Change to your email
    $subject = "New Job Application from $fullname";
    $body = "New job application received:\n\n"
          . "Full Name: $fullname\n"
          . "Email: $email\n"
          . "Phone: $phone\n"
          . "Job Post: $jobpost\n"
          . "Years of Experience: $experience\n";
    $headers = "From: $email\r\nReply-To: $email";

    mail($to, $subject, $body, $headers);

    // Optional: Email confirmation to applicant
    $client_subject = "Thank you for applying to VastuVeda Designs!";
    $client_body = "Hi $fullname,\n\n"
                 . "Thank you for sending your application for the $jobpost position.\n"
                 . "We have received your details and will get back to you soon.\n\n"
                 . "Best Regards,\nVastuVeda Designs";
    $client_headers = "From: careers@vastuvedadesigns.com\r\n";

    mail($email, $client_subject, $client_body, $client_headers);

    // Redirect to thank-you page
    header("Location: thank-you.html");
    exit();
}
?>
