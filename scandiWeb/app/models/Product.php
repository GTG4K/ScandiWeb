<?php

class Product extends Database
{

    private $CategoryList = [1 => 'dvd', 2 => 'book', 3 => 'furniture']; 

    function new_Product($POST) {
        
        $DB = new Database();

        $productQuery = "INSERT INTO products(sku,name,price,category_id) values (:sku,:name,:price,:category_id)";

        // Post 0 => sku, Post 1 => name,  Post 2 => price,  Post 3 => category_id
        // every other Post is additional category details  

        $productDetails['sku'] = $POST[0][1];
        $productDetails['name'] = $POST[1][1];
        $productDetails['price'] = $POST[2][1];
        $productDetails['category_id'] = $POST[3][1];

        $productData = $DB->write($productQuery, $productDetails);

        if($productData){

            //writing the correct SQL to add into category

            $keys = "(category_id,product_id,";
            $values = "(:category_id,:product_id,";
            $categoryDetails = [];
            for($i = 4; $i < count($POST); $i++){
                if($i + 1 == count($POST)){
                    $keys = $keys . $POST[$i][0] . ")";
                    $values = $values . ":" . $POST[$i][0] . ")";
                    $categoryDetails[$POST[$i][0]] = $POST[$i][1];
                }else{
                    $keys = $keys . $POST[$i][0] . ",";
                    $values = $values . ":" . $POST[$i][0] . ",";
                    $categoryDetails[$POST[$i][0]] = $POST[$i][1];
                }
            }
    
            //finishing the SQL string
            $categoryQuery = "INSERT INTO " . $this->CategoryList[$productDetails['category_id']] . $keys . " values " . $values;

            $PID = ($DB->read("SELECT id FROM products ORDER BY id DESC LIMIT 1;"));
            $categoryDetails['product_id'] = $PID[0]['id'];
            $categoryDetails['category_id'] = $POST[3][1];

            $categoryData = $DB->write($categoryQuery, $categoryDetails);

            if($categoryData){
                header("Location:" . ROOT );
                die;
            }

        }
    }

    public function MassDelete($POST){

        $DB = new Database();

        //loop to delete all selected products
        if(isset($POST['delete-checkbox'])){
            for ($i=0; $i < count($POST['delete-checkbox']); $i++) { 
            
                //get product id
                $productDetails['id'] = $POST['delete-checkbox'][$i];
            
                //get product category name and store in $CategoryDetails['name']
                //get product category id and store in $categoryDetails['product_id']
                $CID = ($DB->read("SELECT * FROM products WHERE id = :id", $productDetails));
                // $categoryDetails['name'] = $this->CategoryList[$CID[0]["category_id"]];
                $categoryDetails['product_id'] = $POST['delete-checkbox'][$i];
            
                //Query to delete the product from products table
                $productQuery = "DELETE FROM products WHERE id=:id";
                $productData = ($DB->write($productQuery,$productDetails));
            
                //Query to delete the categoryDetails of the product from the category table
                $categoryQuery = "DELETE FROM ". $this->CategoryList[$CID[0]["category_id"]] ." WHERE product_id=:product_id";
                $categoryData = ($DB->write($categoryQuery, $categoryDetails));
            }
        }
        header("Location:" . ROOT);
    }

    public function getAllProducts()
    {
        $DB = new Database();
        $productData = [];

        for ($i=1; $i <= count($this->CategoryList); $i++){ 
            $productDetails = ($DB->read("SELECT * FROM products INNER JOIN ". $this->CategoryList[$i] ." ON products.id = ". $this->CategoryList[$i].".product_id"));
            array_push($productData, $productDetails);
        }

        return $productData;
    }

    public function DisplayAllProducts()
    {
        $productData = $this->getAllProducts();
        for ($i=0; $i < count($productData); $i++) { 
            for ($j=0; $j < count($productData[$i]); $j++) { 
                echo '<div class="Product-box">';
                echo '<input type="checkbox" name="delete-checkbox[]"class="delete-checkbox" value="' . $productData[$i][$j]['id'] . '">';
                $productDataKeys = array_keys($productData[$i][$j]);
                for ($e=0; $e < count($productData[$i][$j]); $e++) { 
                    switch ($productDataKeys[$e]) {
                        case 'id':
                            continue 2;
                            break;
                        case 'category_id':
                            continue 2;
                            break;
                        case 'created_at':
                            continue 2;
                            break;
                        case 'product_id':
                            continue 2;
                            break;
                        default:
                            # code...
                            break;
                    }

                    echo '<p>' . $productDataKeys[$e] .": ". $productData[$i][$j][$productDataKeys[$e]] . '</p>';
                }

                echo '</div>';
            }
        }

    }

}