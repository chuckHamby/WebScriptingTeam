<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/14/2018
 * Time: 6:23 AM
 */

class SearchController extends AbstractBaseController
{
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        $adminID = $JSON["adminID"];
        $name = $JSON["name"];
        $productID = $JSON["productID"];

        $DAO = new SearchDAO();
        $user = $DAO->get($adminID,$name,$productID);

        if($user == null){
            $this->data["statusCode"] = 500;
            $this->data["statusMsg"] = "No products found";
            return;
        }

        $this->data["statusCode"] = 200;
        $this->data["statusMsg"] = "Successful";


        $this->data["user"] = $user;

    }
}