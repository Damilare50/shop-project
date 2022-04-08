<?php


class Product 
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->conn)) return null;
        $this->db = $db;
    }

    //fetching the data from the database
    public function getData($table = 'product') {
        $result = $this->db->conn->query("SELECT * FROM $table");
        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    } 

    public function getProduct($item_id = null, $table= 'product') {
        if (isset($item_id)) {
            $result = $this->db->conn->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
            $resultArray = array();

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}