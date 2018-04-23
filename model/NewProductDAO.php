<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/14/2018
 * Time: 2:24 AM
 */

class NewProductDAO{
    public function insert($adminID,$productID,$name,$prodDesc,$unitPrice,$bulkPrice,$bulkMinAmt,$QOH){
        $dateAdded = date('Y-m-d\TH:i:s\Z');
        $dateUpdated = date('Y-m-d\TH:i:s\Z');
        $sql = "INSERT INTO products (adminID,ProductID,name,prodDesc,unitPrice,bulkPrice,bulkMinAmt,qoh,dateAdded,dateUpdated)VALUES (?,?,?,?,?,?,?,?,?,?)";
        $record = Db::query($sql,array($adminID,$productID,$name,$prodDesc,$unitPrice,$bulkPrice,$bulkMinAmt,$QOH,$dateAdded,$dateUpdated));

        if($record == 0){
            return null;
        }

        $sql = "SELECT * FROM products WHERE adminID = ? AND ProductID = ?";
        $row = Db::queryOne($sql,array($adminID,$productID));

        if (empty($row))
        {
            return null;
        }
        return $this->create($row);
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