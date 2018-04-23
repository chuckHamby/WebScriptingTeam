<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 11:22 AM
 */

class DeleteAdminDAO{
    public function delete($adminID){
        $sql = "UPDATE admin SET activeIndicator = 0 WHERE adminID = ?";
        $record = Db::query($sql,array($adminID));

        if($record == 0){
            return null;
        }

        $sql = "SELECT * FROM products WHERE adminID = ?";
        $row = Db::queryOne($sql,array($adminID));

        if (empty($row))
        {
            return null;
        }
        return $this->create($row);
    }

    private function create($record){
        $username = $record["adminID"];
        $password = $record["password"];
        $name = $record["name"];
        $activeIndicator = $record["activeIndicator"];
        $createdDate = $record["createdDate"];
        $lastUpdated = $record["lastUpdated"];
        $email = $record["email"];


        return new Admin($username,$password,$name,$activeIndicator,$createdDate,$lastUpdated,$email);
    }
}