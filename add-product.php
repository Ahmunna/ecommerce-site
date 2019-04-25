<?php 
    require_once('header.php');
?>

<form action="handle-add-product.php" method="get">
    <div class="container margin-top"> 

        <h1>Add a product </h1>

        <!-- name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name"  placeholder="Enter name">
        </div>

        <!-- quantity -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" class="form-control" name="quantity"  placeholder="Enter quantity">
        </div>

        <!-- price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price"  placeholder="Enter price">
        </div>

        <!--category -->
        <div class="form-group">
            <label for="price">Category</label>  
            <select class="custom-select" name="category">
                <option  selected value="samsung">Samsung</option>
                <option value="apple">Apple</option>
                <option value="nokia">Nokia</option>
                <option value="oppo">OPPO</option>
                <option value="huawei">Huawei</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<?php require_once('footer.php'); ?>

