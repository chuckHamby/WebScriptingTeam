<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 7:11 PM
 */

class ProductsDAO{
    public function get($adminID){
        $result = array();
        $sql = "SELECT * FROM products WHERE adminID = ?";
        $records = Db::queryAll($sql,array($adminID)); //get all records from DB

        if(empty($records)){
            return null;
        }

        //Loop through all the records to create it's own JSON
        foreach ($records as $record)
        {
            array_push($result,$this->create($record));
        }
        return $result; //return the ASSOC JSON
    }

    private function create($record){
        $productID = $record["ProductID"];
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
