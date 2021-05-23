<?php
session_start();
include "php/databaseConnection.php";

//Make Order
if(isset($_GET["location"])) {
    $location = $_GET["location"];
    $tel = $_GET["tel"];
    $number = $_GET["number"];
    $product = $_GET["product"];
    $buyername = $_SESSION["username"];
    $price = $_GET["price"];
    $sellerEmail = $_GET["seller_email"];
    $date = date("d/m/Y h:m");

    $order_id = rand(0, 10000);

    $makeOrder = "INSERT INTO orders VALUES('$order_id', '$buyername', $number, '$product', '$location', '$tel', '$price', '$date', '$sellerEmail')";
    if($conn->query($makeOrder)) {
        echo "Your order has been made successfully";
    } else {
        echo "error ".$conn->error;
    }
}


//Display orders

//Fetch orders
if (isset($_GET["screen_width"])) {
    $screen_width = $_GET["screen_width"];
    $user_email = $_GET["user_email"];

    $order_id = array();
    $product_name = array();
    $product_price = array();
    $buyer_name = array();
    $location = array();
    $contact = array();
    $date = array();
    $number = array();

    $email = $_SESSION["email"];

        $fetchProducts = "SELECT * FROM orders WHERE seller_email = '$email'";
        $fetchProducts_result = $conn->query($fetchProducts);        
        $total_products = $fetchProducts_result->num_rows;
    
        if ($total_products > 0) {
            while ($products_row = $fetchProducts_result->fetch_assoc()) {
                $order_id[] = $products_row["order_id"];
                $product_name[] = $products_row["product"];
                $product_price[] = number_format((float)$products_row["price"], 2, '.', ',');
                $location[] = $products_row["location"];
                $buyer_name[] = $products_row["buyer_name"];
                $contact[] = $products_row["contact"];
                $date[] = $products_row["date"];
                $number[] = $products_row["number"];
                /*$product_status[] = $products_row["product_status"];*/
            }

            for ($i = 0; $i < $total_products; $i++) {
                if($screen_width > 760) {
                echo <<<PRODUCTCARD
                <div class="order-card">
            <div class="order-card-header">
                <p class="status">NEW ORDER!!</p>
                <p class="order-date">{$date[$i]}</p>
            </div>

            <div class="order-contents">
                <div class="buyer-info">
                    <div class="buyer-info-header"><div id="buyer-info-lottie"></div><p class="title">BUYER INFO</p></div>
                    <p>Name: {$buyer_name[$i]}</p>
                    <p>Contact: {$contact[$i]}</p>
                </div>
                <div class="order-line-divider"></div>
                <div class="order-details">
                    <div class="order-details-header"><div id="order-details-lottie"></div><p class="title">ORDER DETAILS</p></div>
                    <p>Product: {$product_name[$i]}</p>
                    <p>Quantity: {$number[$i]}</p>
                    <p>Cost: <span class="price-span">GH¢{$product_price[$i]}</span></p>
                </div>
                <div class="order-line-divider"></div>
                <div class="location">
                    <div class="location-header"><div id="location-lottie"></div><p class="title">LOCATION</p></div>
                    <p>Location: {$location[$i]}</p>
                </div>
            </div>

            <div class="check-box-div">
                <div></div>
                <button class="complete" onclick="completeOrder({$order_id[$i]})">Complete</button>
            </div>

        </div>
PRODUCTCARD;
            } else {
                echo <<<PRODUCTCARDMOBILE
                <div class="order-card-mobile">
                <div class="order-card-mobile-header">
                    <div class="status-div">
                        <div id="buyer-info-lottie-mobile" class="buyer-details-lottie-mobile"></div>
                        <p>NEW ORDER!!</p>
                    </div>
                    <p>{$date[$i]}</p>
                </div>
                <div class="order-card-mobile-content">
                    <div class="details-header-mobile">
                        <div class="order-details-header-container"><div id="order-details-lottie-mobile"></div><p class="order-details-header-mobile">ORDER DETAILS</p></div>
                        <div class="location-header-container"><div id="location-lottie-mobile"></div><p class="location-header-mobile">LOCATION</p></div>
                    </div>
                    <div class="order-card-mobile-upper-div">
                        <div class="order-details-mobile">
                            <p>Product: {$product_name[$i]} </p>
                            <p>Quantity: {$number[$i]}</p>
                            <p>Price: <span class="price-span">GH¢{$product_price[$i]}</span></p>
                        </div>
                        <div class="order-mobile-line-break"></div>
                        <div class="location-mobile">
                            <p style="display:flex; justify-content:center; align-items:center">{$location[$i]}</p>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="order-card-mobile-lower-div">
                        <div class="buyer-details-mobile">
                            <p>Name: {$buyer_name[$i]}</p>
                            <p>Contact: {$contact[$i]}</p>
                        </div>
                    </div>
                </div>
            </div>
    
PRODUCTCARDMOBILE;
            }
        }
        } else {
            echo <<<NONE
            <div class="no-products" style="display:flex; justify-content:center; align-items:center">
            <p>You have not added any products to sell</p>
        </div>       
NONE;
        }
    
}


?>
