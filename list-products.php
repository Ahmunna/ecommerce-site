<?php
    session_start();
    require_once('header.php');
    require('connexion-db.php');
    require('db-utils.php');
    require('handle-list-product.php');
    $status = '';
    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $connection = connectionDB();
        $utility = new Utils($connection);
        $cardItem = array($id => $utility->findById($id));

        if(empty($_SESSION['shopping_cart']))
        {
            $_SESSION['shopping_cart'] = $cardItem;
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
        else
        {
            if(isset($_SESSION['shopping_cart'][$id])) 
            {
                $status = "<div class='box' style='color:red;'>Product is already added to your cart!</div>";	
            } 
            else 
            {
                $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cardItem
                );
                $status = "<div class='box'>Product is added to your cart!</div>";
            }
        }
    }
   
?>
<div class="container margin-top">
    <h1>List of all Products </h1>
</div>

<div class=" container margin-top">
    <?php echo $status; ?>
    <div class="row justify-content-arround ">
        <?php
        $result = getAllProducts();
        if(!empty($result))
        {

            foreach($result as $row)
            {
                $id = $row->getId();
                $name=$row->getName();
                $quantity = $row->getQuantity();
                $price = $row->getPrice();
                $category = $row->getCategory();
                $action = $_SERVER['PHP_SELF'];

                echo
                "
                <div id='$id' class='card col-sm-3 offset-sm-1 margin-top' style='width: 18rem;''>
                    <form method='post' action='$action'>
                        <input type='hidden' name='id' value='$id' />
                        <img src='phone.png' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>
                                <b>quantity</b>: $quantity<br>
                                <b>price</b>: $price $<br>
                                <b>category</b>: $category<br>
                            </p>
                            <input class='btn btn-primary' class='cartButton' type='submit' value='Add to Cart' name='submit'>
                        </div>
                    </form>
                </div>";
            }
        }
        else
        {
            echo "<h1> No products on the store </h1>";
        }
        ?>
    </div>
</div>
<?php

    require_once('footer.php');
?>