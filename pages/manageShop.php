<?php
include "php/databaseConnection.php";
session_start();

if(!isset($_SESSION["username"])) {
    header("location: ../refer.php");
} else {

    $email = $_SESSION['email'];
    if(isset($_GET["shop_name"]) && isset($_GET["momo"])) {
        $shopName = $_GET["shop_name"];
        $momo = $_GET["momo"];

        $insertShop = "INSERT INTO shops(email, shop_name, momo) VALUES ('$email','$shopName', '$momo')";
        if($conn->query($insertShop)) {
            echo "Shop created";
        } else {
            echo "An error occured while creating your shop ".$conn->error;
        }
    }
}

//Insert product
if(isset($_POST["product-name"])) {
    $product_name = $_POST["product-name"];
    $product_price = $_POST["product-price"];
    $product_number = $_POST["number"];
    $description = $_POST["description"];

    $email = $_SESSION["email"];

    $product_id = rand(0,100000);
    //Get Image Properties
    $file_name = $_FILES['imgFile']['name'];
    $file_size = $_FILES['imgFile']['size'];
    $file_tmp = $_FILES['imgFile']['tmp_name'];
    $ext = (explode('.', $file_name));
    $file_ext = strtolower(end($ext));
    $extensions = array("jpeg", "jpg", "png");
    $image_link = "uploads/" . $product_id . "." . $file_ext;
    $product_status = "Active";

    if (in_array($file_ext, $extensions) === true ) {
        if (move_uploaded_file($file_tmp, "uploads/" . $product_id . "." . $file_ext)) {
            $sql = "INSERT INTO products VALUES ('$product_id', '$email', '$product_name', '$description', '$product_price',  $product_number, '$image_link', '$product_status')";
            if ($conn->query($sql)) {
                echo "inserted";
            } else {
                die("Connection failed" . mysqli_error($conn));
            }
        } 
    }
}



//Respond to request to pause product
if (isset($_GET["pause_id"]) && isset($_GET["pause_name"])) {
    $pause_id = $_GET["pause_id"];
    $pause_name = $_GET["pause_name"];

    //Check if product is already paused;
    $pause_check_query = "SELECT product_status FROM products WHERE product_id = ? LIMIT 1";
    $pause_check_status = $conn->query($pause_check_query);
    $stmt = $conn->prepare($pause_check_query);
    $stmt->bind_param('s', $pause_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pause_check_status = $result->fetch_object()->product_status;
    if ($pause_check_status == "Active") {
        $paused_status = "Paused";
        $alert = " is paused";
    } elseif ($pause_check_status == "Paused") {
        $paused_status = "Active";
        $alert = " is active";
    }

    if ($paused_status) {
        $pause_query = "UPDATE products SET product_status = '$paused_status' WHERE product_id = '$pause_id'";
        if ($conn->query($pause_query)) {
            echo $pause_name . $alert;
        } else {
            echo "Could not pause";
        }
    }
}


//Respond to request to delete product
if (isset($_GET["delete_id"]) && isset($_GET["delete_name"])) {
    $delete_id = $_GET["delete_id"];
    $delete_name = $_GET["delete_name"];
    $delete_query = "DELETE FROM products WHERE product_id= '$delete_id'";
    if ($conn->query($delete_query)) {
        echo $delete_name . " has been deleted";
    } else {
        echo "A problem occured while deleting";
    }
}

?>