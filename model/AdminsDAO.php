<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/17/2018
 * Time: 1:21 PM
 */

class AdminsDAO{
    public function get(){
        $result = array();
        $sql = "SELECT * FROM admin";
        $records = Db::queryAll($sql,array());

        if(empty($records)){
            return null;
        }
        foreach ($records as $record)
        {
            array_push($result,$this->create($record));
        }
        return $result; //return the ASSOC JSON
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