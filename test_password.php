<?php

$inputPassword = "admin123";
$storedHash = '$2b$12$oBtSHvpM0UBnpjKE1xSiyuiK3Y51up7MiOEa3YWO6Rv3UbXOCoHdy';

if (password_verify($inputPassword, $storedHash)) {
    echo "Password is correct!";
} else {
    echo "Password is incorrect!";
}
?>
