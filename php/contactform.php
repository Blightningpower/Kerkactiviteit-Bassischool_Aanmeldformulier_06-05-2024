<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groep = $_POST['Groep'];
    $naamDeelnemer = $_POST['naamDeelnemer'];
    $telefoonDeelnemer = $_POST['telefoonnummerDeelnemer'];
    $emailDeelnemer = $_POST['emailDeelnemer'];
    $iban = $_POST['iBAN'];

    // Email configuration
    $mailTo = "ginah1332@gmail.com";
    $subject = "Form Submission"; // Set your email subject here
    $headers = "From: " . $emailDeelnemer; // You can set the sender's email here

    // Email content
    $txt = "Je hebt een aanmelding ontvangen van " . "\n"
        . $naamDeelnemer . ".\n\n" .
        "Groep: " . "\n"
        . $groep . "\n\n" .
        "Voor- en Achternaam deelnemer: " . "\n"
        . $naamDeelnemer . "\n\n" .
        "Telefoonnummer Deelnemer: " . "\n"
        . $telefoonDeelnemer . "\n\n" .
        "Email Deelnemer: " . "\n"
        . $emailDeelnemer . "\n\n" .
        "IBAN: " . "\n"
        . $iban . "\n\n";

    // CSS for bold styling
    $css = "font-weight: bold;";

    // Send email
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n"; // Set content type to plain text
    $headers .= "Content-Transfer-Encoding: 8bit\r\n"; // Set content transfer encoding
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n"; // Set X-Mailer

    // Send email
    mail($mailTo, $subject, $txt, $headers);




    $_SESSION['form_submitted'] = true;

    // Redirect to another page
    header("Location: ../html/payment.html");
    exit();
}
?>