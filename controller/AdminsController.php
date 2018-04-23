<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/17/2018
 * Time: 1:17 PM
 */

class AdminsController extends AbstractBaseController {
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        $username = $JSON["username"];
        $password = $JSON["password"];

        $DAO = new AdminsDAO();
        $user = $DAO->get();

        if($user == null){
            $this->data["statusCode"] = 500;
            $this->data["statusMsg"] = "No user found";
            return;
        }

        $this->data["statusCode"] = 200;
        $this->data["statusMsg"] = "Successful";

        $this->data["user"] = $user;
    }
}