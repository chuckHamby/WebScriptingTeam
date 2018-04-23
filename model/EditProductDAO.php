<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 4:44 PM
 */

class EditProductDAO{
    public function update($adminID,$productID,$name,$prodDesc,$unitPrice,$bulkPrice,$bulkMinAmt,$QOH){
        $dateUpdated = date('Y-m-d\TH:i:s\Z');
        $sql = "UPDATE products SET name = ?, prodDesc = ?, unitPrice = ?, bulkPrice = ?, bulkMinAmt = ?, qoh = ?, dateUpdated = ? WHERE adminID = ? AND ProductID = ?";
        $record = Db::query($sql,array($name,$prodDesc,$unitPrice,$bulkPrice,$bulkMinAmt,$QOH,$dateUpdated,$adminID,$productID));

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