<?php
session_start();
unset($_SESSION['email']);
session_destroy();
echo 'success';
?>