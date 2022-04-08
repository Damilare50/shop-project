<?php


class Wishlist 
{
    public $db;

    public function __construct(DBController $db)
    {
        if (!isset($db->conn)) return null;
        $this->db = $db;
    }

    public function insertIntoWishlist($wish = null, $table = 'wishlist') {
        if($this->db->conn != null) {
            if($wish != null) {
                $columns = implode(',', array_keys($wish));
                $values = implode(',', array_values($wish));

                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);
                $result = $this->db->conn->query($query_string);
                return $result;
            }
        }
    }

    public function addToWishlist($item_id, $user_id) {
        if (isset($user_id) && isset($item_id)) {
            $wish = array(
                "user_id" => $user_id,
                "item_id" => $item_id
            );

            $result = $this->insertIntoWishlist($wish);
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    public function deleteWishItem($item_id = null, $table = 'wishlist') {
        if ($item_id != null) {
            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getWishId($wishArray = null, $key = "item_id") {
        if ($wishArray != null) {
            $wish_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $wishArray);
            return $wish_id;
        }
    }
}