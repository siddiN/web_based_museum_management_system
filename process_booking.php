<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $visitorType = $_POST['visitor_type'];
    $numMembers = (int)$_POST['num_members'];

    // Save the details to session for further processing
    $_SESSION['visitor_type'] = $visitorType;
    $_SESSION['num_members'] = $numMembers;

    header("Location: slot_selection.php");
    exit();
}
