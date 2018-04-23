<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/17/2018
 * Time: 3:37 PM
 */

class DeleteAdminController extends AbstractBaseController {
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        $adminID = $JSON["adminID"];
        $DAO = new DeleteAdminDAO();
        $user = $DAO->delete($adminID);

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