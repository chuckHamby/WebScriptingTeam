<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 11:22 AM
 */

class DeleteProductDAO{
    public function delete($adminID,$productID){
        $sql = "DELETE FROM products WHERE adminID = ? AND ProductID = ?";
        $record = Db::query($sql,array($adminID,$productID));

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