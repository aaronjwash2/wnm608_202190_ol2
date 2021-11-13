<?php

include_once "lib/php/functions.php";

// Call mySQL database
$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];

// Explode out list of images in database
$images = explode(",", $product->images);

// Use array_reduce to select individual images from the list and produce them as an img src
$image_elements = array_reduce($images,function($r,$o){
    return $r."<img src='img/$o' />";
})

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product &ndash; AWesome Stuff</title>
    <?php include "parts/meta.php"; ?>
</head>
<body>

    <?php include "parts/navbar.php"; ?>

    <!-- *** CRUMB NAV *** -->
    <nav class="nav nav-crumbs" style="margin-top: 5rem;">
        <ul style="margin-left: 0;">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php"><?= $_GET['category'] ?></a></li>
            <li class="active"><a href="#"><?= $_GET['type'] ?></a></li>
        </ul>
    </nav>

    <!-- *** PRODUCT CONTENT *** -->
    <br />
    <br />
    <div class="container">
        <div class="grid gap">
            <div class="col-xs-6" style="text-align: center;">
                <div class="images-main">
                    <img src="img/<?=$product->images?>"
                        alt="$product->name &ndash; $product->category"
                        title="$product->name &ndash; $product->category" />
                </div>
                <div class="images-thumbs">
                    <?= $image_elements ?>
                </div>
            </div>
            <div class="col-xs-6 product-text">
                <h3><?= $product->name ?></h3>
                <h4><b>&dollar;<?= $product->price ?></b></h4>
                <p>
                    Product Description copy goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Mauris non interdum erat. Quisque ut euismod lorem. Aliquam ac condimentum dui. 
                    Nullam purus elit, semper id suscipit non, tincidunt eget justo.
                </p>
                <br />
                <h5>Size</h5>
                <div class="form-select form-control" style="width: 6rem;">
                    <select>
                        <option>XS</option>
                        <option>SM</option>
                        <option>MD</option>
                        <option>LG</option>
                        <option>XL</option>
                        <option>2X</option>
                    </select>
                </div>
                <br />
                <h5>Quantity</h5>
                <div class="form-select form-control" style="width: 6rem;">
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <br />
                <a href="cart.php"><button class="dark">Add to Cart</button></a>
            </div>
        </div>
    </div>

    <!-- *** FOOTER *** -->
    <?php include "parts/footer.php"; ?>
    
</body>
</html>