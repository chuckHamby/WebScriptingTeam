<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/17/2018
 * Time: 7:59 PM
 */

class EditAdminDAO{
    public function update($adminID,$password,$name,$email){
        $dateUpdated = date('Y-m-d\TH:i:s\Z');
        $sql = "UPDATE admin SET password = ?, name = ?, email = ?, lastUpdated = ?, activeIndicator = 1 WHERE adminID = ?";
        $record = Db::query($sql,array($password,$name,$email,$dateUpdated,$adminID));

        if($record == 0){
            return null;
        }

        $sql = "SELECT * FROM admin WHERE adminID = ?";
        $row = Db::queryOne($sql,array($adminID));

        if (empty($row))
        {
            return null;
        }
        return $this->create($row);
    }

    private function create($record){
        $adminID = $record["adminID"];
        $password = $record["password"];
        $name = $record["name"];
        $activeIndicator = $record["activeIndicator"];
        $createdDate = $record["createdDate"];
        $lastUpdated = $record["lastUpdated"];
        $email = $record["email"];


        return new Admin($adminID,$password,$name,$activeIndicator,$createdDate,$lastUpdated,$email);
    }
}