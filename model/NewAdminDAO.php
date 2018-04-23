<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/14/2018
 * Time: 2:24 AM
 */

class NewAdminDAO{
    public function insert($adminID,$password,$name,$email){
        $createdDate = date('Y-m-d\TH:i:s\Z');
        $lastUpdated = date('Y-m-d\TH:i:s\Z');
        $activeIndicator = 1;
        $sql = "INSERT INTO admin (adminID,password,name,activeIndicator,createdDate,lastUpdated,email) VALUES (?,?,?,?,?,?,?)";
        $record = Db::query($sql,array($adminID,$password,$name,$activeIndicator,$createdDate,$lastUpdated,$email));

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