<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 1:59 PM
 */

class AdminDAO{
    public function get($username, $password){
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

        return new Admin($username, $password);
    }
}