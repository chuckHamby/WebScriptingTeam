<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/17/2018
 * Time: 7:58 PM
 */

class EditAdminController extends AbstractBaseController {
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        try{
            if(is_null($JSON)){
                throw new Exception("No data passed to server");
            }
        }catch(Exception $e){
            console.log($e);
        }

        try {
            $adminID = $JSON["adminID"];
            $password = $JSON["password"];
            $name = $JSON["name"];
            $email = $JSON["email"];

            if(strpos($adminID, " ")){
                throw new Exception("adminID cannot contain whitespace");
            }
            if(strpos($password, " ")){
                throw new Exception("password cannot contain whitespaces");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new Exception("email is invalid");
            }
        }catch(Exception $e){
            console.log($e);
        }
        $DAO = new EditAdminDAO();
        $user = $DAO->update($adminID,$password,$name,$email);

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