<?php
// Secure code to prevent XSS
if(isset($_POST['name'])){
    // Encode the input so it is displayed as text, not executed as code
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    echo "Hello " . $name;
}
?>