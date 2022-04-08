<?php


class Cart 
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->conn)) return null;
        $this->db = $db;
    }

    public function insertIntoCart($params = null, $table = "cart") {
        if($this->db->conn != null) {
            if($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
                $result = $this->db->conn->query($query_string);
                return $result;
            }
        }
    } 

    public function addToCart($item_id, $user_id, $pos) {
        if (isset($user_id) && isset($item_id)) {
            $params = array(
                "user_id" => $user_id,
                "item_id" => $item_id
            );

            $result = $this->insertIntoCart($params);
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF'] . $pos);
            }
        }
    }

    public function getProductSum($arr) {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    public function deleteCartItem($item_id = null, $table = 'cart') {
        if ($item_id != null) {
            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getCartId($cartArray = null, $key = "item_id") {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }
}