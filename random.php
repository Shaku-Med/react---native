<?php
$bytes = openssl_random_pseudo_bytes(50);
$pass = bin2hex($bytes);
?>
