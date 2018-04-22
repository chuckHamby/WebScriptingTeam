<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 1:59 PM
 */

class AdminDAO{
    public function get($username,$password){
        $sql = "SELECT * FROM admin WHERE adminID = ? AND password = ?";
        $record = Db::queryOne($sql,array($username, $password));

        if(empty($record)){
            return null;
        }
        return $this->create($record);
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

//    public function insert($username,$password,$name,$activeIndicator,$createDate,$lastUpdated,$email)
//    {
//        $sql = "INSERT INTO admin VALUES (?,?,?,?,?,?,?)";
//        $result = Db::query($sql,array($username,$password,$name,$activeIndicator,$createDate,$lastUpdated,$email));
//
//        if (empty($result))
//        {
//            return null;
//        }
//        return $this->create($result);
//    }
}