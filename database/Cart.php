<?php

//Using for Add to Cart functionality
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }
    
    //Inset into "cart" table 
    public function insertIntoCart($params = null, $table='cart')
    {
        if($this->db->con != null){
            if($params != null){
                //"Insert into cart(user_id) values (0)"
                //get table columns
                $columns = implode(',', array_keys($params));
                // print_r($columns);
                $values = implode(',', array_values($params));                                
                // print_r($values);

                //create query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
                
                //execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    //to get user_id and item_id and insert it into cart table
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                'user_id' => $userid,                
                'item_id' => $itemid,                
            );

            //insert data into cart
            $result = $this->insertIntoCart($params);
            if($result){
                header("Location:".$_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }

    //calculate sub-total
    public function getSum($arr)
    {
        $sum = 0;
        if(isset($arr)){
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf("%.2f", $sum);
        }
    }

    //delete cart item using cart item_id
    public function deleteCart($item_id = null, $table= 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
            if($result){
                header("Location:", $_SERVER["PHP_SELF"]);
            }
            return $result;
        }
    }

    //get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            }, $cartArray);
        return $cart_id;
        }
    }

    //save for later
    public function saveForLater($item_id = null, $save_table="wishlist", $from_table="cart"){
        if($item_id != null){
            $query = "INSERT INTO {$save_table} SELECT * FROM {$from_table} WHERE item_id = {$item_id};";
            $query .= "DELETE FROM {$from_table} WHERE item_id = {$item_id}";

            //execute multiple queries
            $result = $this->db->con->multi_query($query);
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
}

?>