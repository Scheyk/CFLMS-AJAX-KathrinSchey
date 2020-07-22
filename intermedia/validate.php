<?php
$action = $_POST['action'];

if($action == 'validate_email')
{
    $email = $_POST['userEmail'];
    echo "this";  
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        echo 'error';
}
?>