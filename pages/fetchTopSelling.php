<?php
require_once "php/databaseConnection.php";
session_start();

if (isset($_GET["topSelling"])) {
    //echo "Load products";
    $product_id = array();
    $product_name = array();
    $product_description = array();
    $product_price = array();
    $product_image = array();
    $image_ext = array();
    $piecesLeft = array();
    $shop_name = array();

    $fetch_home = "SELECT * FROM products WHERE product_status = 'Active' LIMIT 30";
    $fetch_home_result = $conn->query($fetch_home);
    $total = $fetch_home_result->num_rows;

    if ($total > 0) {
        while ($products_row = $fetch_home_result->fetch_assoc()) {
            $product_id[] = $products_row["product_id"];
            $product_name[] = $products_row["product_name"];
            $product_description[] = $products_row["description"];
            $product_price[] = number_format((float)$products_row["product_price"], 2, '.', ',');
            $product_image[] = $products_row["img_link"];
            $piecesLeft[] = $products_row["number"];

        }

        for($i=0; $i<$total; $i++) {
            $get_shop_name = "SELECT * FROM shops";
            $shop_name_result = $conn->query($get_shop_name);
            if($shop_name_result->num_rows > 0) {
                $shop_name[$i] = $shop_name_result->fetch_object()->shop_name;
            }
        }

        for($i=0; $i<$total; $i++) {
            echo <<<FEATUREDCARD
            <a href="pages/details.php?product_id={$product_id[$i]}>"
            <div class="item">
            <div class="image">
            <img src="pages/{$product_image[$i]}" alt="">
            </div>
            <div class="details">
            <div class="bottom-card">
            <div>
            <h5 class="name">{$product_name[$i]}</h5>
            </div>
            <div>
            <h5 class="shop">{$shop_name[$i]}</h5>
            </div>
            <div><h5 class="price">GH¢{$product_price[$i]}</h5>
            </div>
            </div>
            </div>
            </div>
            </a>
FEATUREDCARD;
        }

        for($i=0; $i < 8; $i++) {
            echo <<<SPACEFILLERS
            <div class="space-filler"></div>
SPACEFILLERS;
        }
        
    } else {
        echo '<div class="no-products">No Products Here</div>';
    }
}
