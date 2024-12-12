<?php
session_start();
if (isset($_POST['id_usbcc'], $_POST['id_lc_usbcc'])) {
    
    include ('../connection/connection.php');
    // Update the database
    
    
    $id_user = $_POST['id_usbcc'];
    $us_status = $_POST['id_lc_usbcc'];
    $sql_up = $conn->prepare("UPDATE users SET id_lc_usbcc = '$us_status' WHERE id_usbcc = '$id_user' ");
    $sql_up->execute();

    // Close the database connection
    $conn = null;

    echo 'Success: Database updated successfully!';
} else {
    echo 'Error: Missing parameters!';
}
