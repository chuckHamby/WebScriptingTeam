<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/14/2018
 * Time: 6:22 AM
 */

class SearchDAO{
    public function get($adminID,$name,$productID){
        $result = array();
        $sql = "SELECT * FROM products WHERE adminID = ? AND name LIKE ? AND ProductID LIKE ?";
        $records = Db::queryAll($sql,array($adminID,$name,$productID)); //get all records from DB

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