<?php
include "databaseConnection.php";
session_start();


//Fetch dashboard products
if (isset($_GET["screen_width"])) {
    $screen_width = $_GET["screen_width"];

    $product_id = array();
    $product_name = array();
    $product_description = array();
    $product_price = array();
    $product_image = array();
    $image_ext = array();
    $product_category = array();
    $orders = array();
    $clicks = array();
    $views = array();
    $impressions = array();
    $piecesLeft = array();
    $product_status = array();

    $email = $_SESSION["email"];

        $fetchProducts = "SELECT * FROM products WHERE email = '$email'";
        $fetchProducts_result = $conn->query($fetchProducts);
        $total_products = $fetchProducts_result->num_rows;
    
        if ($total_products > 0) {
            while ($products_row = $fetchProducts_result->fetch_assoc()) {
                $product_id[] = $products_row["product_id"];
                $product_name[] = $products_row["product_name"];
                $product_description[] = $products_row["description"];
                $product_price[] = number_format((float)$products_row["product_price"], 2, '.', ',');
                $product_image[] = $products_row["img_link"];
                $piecesLeft[] = $products_row["number"];
                $product_status[] = $products_row["product_status"];
            }

            for ($i = 0; $i < $total_products; $i++) {
                if($screen_width > 760) {
                echo <<<PRODUCTCARD
                <div class="product-card">
                <div class="image-preview" style="background-color:white">
                    <div class="product-header">{$product_name[$i]}</div>
                    <div id="product-image" class="content"><img src="{$product_image[$i]}" alt=""></div>
                </div>
 
                <div class="right-details">
    
                <div class="right-horizontal">
                <div class="price">
                    <div class="header">Price</div>
                    <div class="content">
                        GH¢{$product_price[$i]}
                    </div>
                </div>
                <div class="pieces-left">
                    <div class="header">Pieces Left</div>
                    <div class="content">{$piecesLeft[$i]}</div>
                </div>
                <div class="clicks">
                    <div class="header">Clicks</div>
                    <div class="content">0</div>
                </div>
                <div class="impressions">
                    <div class="header">Impressions</div>
                    <div class="content">0</div>
                </div>
                <div class="orders">
                    <div id= "orders-header-div" class="header">Orders</div>
                    <span>{$product_status[$i]}</span>
                    <div id= "order-content" class="content">0</div>
                </div>
                
            </div>
    
            <div class="horizontal-line-divider"></div>
    
                <div class="button-container">
                    <button type="button" onclick="deleteProduct('{$product_id[$i]}', '{$product_name[$i]}')" class="delete">Delete</button>
                    <button type="button" onclick="pauseProduct('{$product_id[$i]}', '{$product_name[$i]}')" class="pause">Pause</button>
                    <button type="button" onclick="previewProduct('{$product_id[$i]}')" class="preview">Preview</button>
                </div>
        </div>
        </div>
PRODUCTCARD;
            } else {
                echo <<<PRODUCTCARDMOBILE
                <div class="product-card-mobile">
            <div class="image-preview-mobile">
                <div class="status-mobile">{$product_status[$i]}</div>
                <img class="preview-mobile" src="{$product_image[$i]}">
            </div>
            <div class="right-details-mobile">
                <div id="product${i}"  class="right-details-content">
                    <p>Product: {$product_name[$i]}</p>
                    <p>Price: GH¢{$product_price[$i]}</p>
                    <div id="ellipsis${i}" class="ellipsis"><img src="../icons/ellipsis.svg" alt=""></div>
                </div>
                <div class="dashboard-icons-mobile">
                    <button onclick="deleteProduct('{$product_id[$i]}', '{$product_name[$i]}')" class="dashboard-icons"><img src="../icons/svgs/trash-alt-solid.svg" alt=""></button>
                    <button onclick="previewProduct('{$product_id[$i]}', '{$email}')" class="dashboard-icons"><img src="../icons/svgs/eye-solid.svg" alt=""></button>
                    <button onclick="pauseProduct('{$product_id[$i]}', '{$product_name[$i]}')" class="dashboard-icons" id="pause-mobile-div"><img src="../icons/svgs/pause-solid.svg" class="pause-mobile-icon" alt=""></button>
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