<?php
    include('product.php');
    session_start();
    //unset($_SESSION['shopping_cart']);
    require_once('header.php');
    if(isset($_POST['submit_cart']))
    {
        $id=$_POST['id_cart'];
        unset($_SESSION['shopping_cart'][$id]);
    }
    //var_dump($_SESSION['shopping_cart'])
    
   
?>
<div class="container margin-top">

    <div class="h1" style="text-align : center">My cart</div>
    <?php
    if(isset($_SESSION['shopping_cart']))
    {
        foreach($_SESSION['shopping_cart'] as $key=>$value)
        {
            $id=$value->getId();
            $name=$value->getName();
            $quantity = $value->getQuantity();
            $price = $value->getPrice();
            $category = $value->getCategory();
            $action=$_SERVER['PHP_SELF'];
            echo 
            "<form action='$action' method='post'>
                <input type='hidden' name='id_cart' value='$id' />
                <div class='card md-12 margin-top'>
                    <div class='row no-gutters'>
                        <div class='col-md-4'>
                            <img src='phone.png' class='card-img' alt='...'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>$name</h5>
                                <p class='card-text'>
                                    <b>price</b>: $price<br>
                                    <b>quantity</b>: $quantity<br>
                                    <b>category</b>: $category<br>
                                </p>
                                <button class='btn btn-primary'>See details</button>
                                <input class='btn btn-primary' type='submit' name='submit_cart' value='remove from cart'/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>";
        }
    }
    else
    {
        echo "<h1> NO items in the cart</h1>";
    }
    
    ?>
    
</div>


<?php
    require_once('footer.php');
?>