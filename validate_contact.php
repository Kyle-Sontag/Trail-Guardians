<?php
// Validate contact form fields

function validateContactForm($data) {
    $errors = [];

    // Validate name
    $name = trim($data['name'] ?? '');
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    } elseif (strlen($name) > 50) {
        $errors['name'] = 'Name cannot exceed 100 characters.';
    }

    // Validate email
    $email = trim($data['email'] ?? '');
    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    } elseif (strlen($email) > 100) {
        $errors['email'] = 'Email cannot exceed 255 characters.';
    }

    // Validate subject
    $subject = trim($data['subject'] ?? '');
    if (empty($subject)) {
        $errors['subject'] = 'Subject is required.';
    } elseif (strlen($subject) > 100) {
        $errors['subject'] = 'Subject cannot exceed 200 characters.';
    }

    // Validate message
    $message = trim($data['message'] ?? '');
    if (empty($message)) {
        $errors['message'] = 'Message is required.';
    } elseif (strlen($message) < 10) {
        $errors['message'] = 'Message must be at least 10 characters.';
    } elseif (strlen($message) > 2000) {
        $errors['message'] = 'Message cannot exceed 2000 characters.';
    }

    return $errors;
}

// Sanitize form data
function sanitizeContactData($data) {
    return [
        'name' => htmlspecialchars(trim($data['name'] ?? ''), ENT_QUOTES, 'UTF-8'),
        'email' => filter_var(trim($data['email'] ?? ''), FILTER_SANITIZE_EMAIL),
        'subject' => htmlspecialchars(trim($data['subject'] ?? ''), ENT_QUOTES, 'UTF-8'),
        'message' => htmlspecialchars(trim($data['message'] ?? ''), ENT_QUOTES, 'UTF-8')
    ];
}

// Simple CSRF protection
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>