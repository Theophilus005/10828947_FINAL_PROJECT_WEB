<?php
include 'php/databaseConnection.php';
session_start();

if(isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];

    //Delete product
    $delete_query = "DELETE FROM orders WHERE order_id = $delete_id";
    if($conn->query($delete_query)) {
        echo "Order successfully completed";
    } else {
        echo "Order not be completed";
    }
}


?>