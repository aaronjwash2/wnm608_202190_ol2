<?php

// Every time this runs, it is passed the currently reducing object and the current object in the loop
// $r is currently reducing value, $o is current object in the loop
function productListTemplate($r,$o) {
return $r.<<<HTML
<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
    <a href="product.php?id=$o->id&category=$o->category&type=$o->type">
        <figure class="figure product-overlay">
            <img src="img/$o->thumbnail" alt="$o->name &ndash; $o->category" />
            <figcaption>
                <div class="caption-body">
                    <h4>$o->name</h4>
                    <p>&dollar;$o->price</p>
                </div>
            </figcaption>
        </figure>
    </a>
</div>
HTML;
}


function cartListTemplate($r,$o) {
return $r.<<<HTML
<div class="card-light cart-item form-control display-flex">
    <div class="flex-none images-cart">
        <img src="img/$o->thumbnail"
            alt="Premium Tshirt &ndash; Mens"
            title="Premium Tshirt &ndash; Mens" />
    </div>
    <div class="flex-stretch" style="padding-left: 2em;">
        <h3>$o->name</h3>
        <div>Delete</div>
    </div>
    <div class="flex-none">
        <h5>&dollar;$o->price</h5>
    </div>
</div>
HTML;
}

?>