<?php
    include('product.php');
    include('db-utils.php');
    require_once('header.php');
    require_once('connexion-db.php');
    $result='';
    if(isset($_POST['search']))
    {
        $sarch_query = $_POST['search_query'];
        $connection = connectionDB();
        $utility = new Utils($connection);
        $products = $utility->findByQuery($sarch_query);

        foreach($products as $row)
            {
                $id = $row->getId();
                $name=$row->getName();
                $quantity = $row->getQuantity();
                $price = $row->getPrice();
                $category = $row->getCategory();
                $action = $_SERVER['PHP_SELF'];

                $result.= "<div id='$id' class='card col-sm-3 offset-sm-1 margin-top' style='width: 18rem;''>
                            <form method='post'>
                                <input type='hidden' name='id' value='$id' />
                                <img src='phone.png' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name</h5>
                                    <p class='card-text'>
                                        <b>quantity</b>: $quantity<br>
                                        <b>price</b>: $price $<br>
                                        <b>category</b>: $category<br>
                                    </p>
                                    <input class='btn btn-primary' class='cartButton' type='submit' value='show details' name='submit'>
                                </div>
                            </form>
                        </div>";
            }
        }
?>

<div class="container margin-top center">
    <h1>Search for a product</h1>
    <form class="form-inline row .text-center margin-top" action='<?php echo $_SERVER['PHP_SELF'];?>' method="post">
        <div class="container-fluid">
            <input class="form-control mr-sm-2 col-md-8" type="search" placeholder="Look for product" aria-label="Search" name="search_query" >
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0 col-md-2" type="submit" value="search" name="search"/>
        </div>
    </form>
</div>

<div class="container margin-top">
    <div class="row">
        <?php echo $result; ?>
    </div>
</div>


<?php
    require_once('footer.php');
?>