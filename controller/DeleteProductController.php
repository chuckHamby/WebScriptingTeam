<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 11:21 AM
 */

class DeleteProductController extends AbstractBaseController {
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        $adminID = $JSON["adminID"];
        $productID = $JSON["productID"];
        $DAO = new DeleteProductDAO();
        $user = $DAO->delete($adminID,$productID);

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