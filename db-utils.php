<?php 

class Utils
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    //add a product to the database
    public function addProduct($product)
    {
        //getting the parameters
        $name=$product->getName();
        $quantity = $product->getQuantity();
        $price = $product->getPrice();
        $category = $product->getCategory();

        $sql = "INSERT INTO product (name,quantity,price,category) VALUES ('$name','$quantity','$price','$category');";
        try
        {
            $this->conn->exec($sql);
            file_put_contents('log.txt',"New record created successfully")  ;
        }
        catch(PDOException $e)
        {
            file_put_contents('log.txt',$e->getMessage());
        }    
    }

    //select all product
    public function findAll()
    {
        try
        {
            $sql="SELECT * FROM product;";
            $statement = $this->conn->query($sql);
            $products=array();
            foreach ($statement as $row) {

                $my_product=new Product($row['name'],$row['quantity'],$row['price'],$row['category']);
                array_push($products,$my_product);
            }
            return $products;
        }
        catch(Exception $e)
        {
            return null;
        }
        
    }

}