<?php
session_start();
require_once 'validate_contact.php';

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Validate CSRF token
if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
    die('Security error: Invalid request token');
}

// Validate the form data
$errors = validateContactForm($_POST);

if (empty($errors)) {
    // Sanitize the data
    $clean_data = sanitizeContactData($_POST);

    // Email configuration
    $to = 'jdoe123@example.com';
    $subject = 'Portfolio Contact: ' . $clean_data['subject'];

    // Create email body
    $email_body = "New contact form submission:\n\n";
    $email_body .= "Name: " . $clean_data['name'] . "\n";
    $email_body .= "Email: " . $clean_data['email'] . "\n";
    $email_body .= "Subject: " . $clean_data['subject'] . "\n\n";
    $email_body .= "Message:\n" . $clean_data['message'] . "\n\n";
    $email_body .= "---\n";
    $email_body .= "Sent from: " . $_SERVER['HTTP_HOST'] . "\n";
    $email_body .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";
    $email_body .= "Date: " . date('Y-m-d H:i:s');

    // Email headers
    $headers = array(
        'From' => $clean_data['email'],
        'Reply-To' => $clean_data['email'],
        'X-Mailer' => 'PHP/' . phpversion(),
        'Content-Type' => 'text/plain; charset=UTF-8'
    );

    // Convert headers array to string
    $header_string = '';
    foreach ($headers as $key => $value) {
        $header_string .= $key . ': ' . $value . "\r\n";
    }

    // Try to send the email
    if (mail($to, $subject, $email_body, $header_string)) {
        // Success - redirect with success message
        header('Location: index.php?contact=success#contact');
        exit;
    } else {
        // Email failed to send
        $_SESSION['contact_error'] = 'Sorry, there was an error sending your message. Please try again later.';
        header('Location: index.php?contact=error#contact');
        exit;
    }
} else {
    // Validation failed - store errors and form data
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    header('Location: index.php?contact=error#contact');
    exit;
}
?>