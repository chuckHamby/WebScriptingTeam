<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 7:11 PM
 */

class ProductsDAO{
    public function get($username){
        $sql = "SELECT * FROM products WHERE adminID = ?";
        $record = Db::queryAll($sql,array());

        if(empty($record)){
            return null;
        }
        return $this->create($record);
    }

    private function create($record){
        $productID = $record["productID"];
        $adminID = $record["adminID"];
        $name = $record["name"];
        $prodDesc = $record["prodDesc"];
        $unitPrice = $record["unitPrice"];
        $bulkPrice = $record["bulkPrice"];
        $bulkMinAmt = $record["bulkMinAmt"];
        $qoh = $record["qoh"];
        $dateAdded = $record["dateAdded"];
        $dateUpdated = $record["dateUpdated"];


        return new Products($productID, $adminID, $name, $prodDesc, $unitPrice, $bulkPrice, $bulkMinAmt, $qoh,$dateAdded, $dateUpdated);
    }
}