<?php
    ob_start(); // Turn on output buffering
    session_start();
    include("../connection.php");

    if(isset($_GET['ref_no'])) {
        if(empty($_GET['ref_no'])) {
            echo "The 'id' parameter is set but empty.";
        } else {
            $food_id = $_GET['ref_no'];
            $sql = "delete FROM issued_fines WHERE ref_no = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $food_id); // 's' represents a string, adjust if the username is of a different type
            $stmt->execute();
            header("Location: payements_thankyou.php");
            exit(); // Ensure no further output is sent
        }
    } else {
        echo "The 'id' parameter is not set in the URL.";
    }
    ob_end_flush(); // Send the buffered output
?>