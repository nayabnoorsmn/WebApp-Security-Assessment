<?php
// Secure code to prevent CSRF
session_start();

// Generate a random token and store it in the session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Token is valid, proceed with password change
        echo "Password changed successfully!";
    } else {
        // Token mismatch, reject the request
        echo "CSRF attack detected! Request blocked.";
    }
}
?>

<!-- HTML Form with embedded token -->
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    <input type="text" name="new_password">
    <input type="submit">
</form>