<?php
    session_start();
    require_once('header.php');
    require('handle-list-product.php');
?>
<div class="container margin-top">
    <h1>List of all Products </h1>
</div>

<div class=" container margin-top">
    <div class="row justify-content-arround ">
        <?php
        $result = getAllProducts();
        foreach($result as $row)
        {
            $name=$row->getName();
            $quantity = $row->getQuantity();
            $price = $row->getPrice();
            $category = $row->getCategory();
            echo
            "<div class='card col-sm-3 offset-sm-1 margin-top' style='width: 18rem;''>
                <img src='phone.png' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$name</h5>
                    <p class='card-text'>
                        <b>quantity</b>: $quantity<br>
                        <b>price</b>: $price $<br>
                        <b>category</b>: $category<br>
                    </p>
                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<?php

    require_once('footer.php');
?>