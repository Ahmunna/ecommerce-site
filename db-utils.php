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

                $my_product=new Product($row['id_product'],$row['name'],$row['quantity'],$row['price'],$row['category']);
                array_push($products,$my_product);
            }
            return $products;
        }
        catch(Exception $e)
        {
            return null;
        }
        
    }
    public function findById($id)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id_product=? ;");
            $stmt->execute([$id]); 
            $row = $stmt->fetch();
            return new Product($row['id_product'],$row['name'],$row['quantity'],$row['price'],$row['category']);
        }
        catch(Exception $e)
        {
            return null;
        }
       
    }

    public function findByQuery($query)
    {
        try
        {   
            $statement = $this->conn->query("SELECT * FROM product WHERE name like '%$query%' ;");
            //$statement->execute([$query]);
            //$result = $statement->fetchAll();
            $products = array();
            foreach($statement as $row)
            {
                $my_product=new Product($row['id_product'],$row['name'],$row['quantity'],$row['price'],$row['category']);
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