<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['email']) && $_SESSION['email'] !== 'NO@EMAIL') {
    echo json_encode(['loggedIn' => true]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>