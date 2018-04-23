<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 4:44 PM
 */

class EditProductController extends AbstractBaseController {
    function process($params){
        $body = file_get_contents("php://input");
        $JSON = json_decode($body, true);

        try{
            if(is_null($JSON)){
                throw new Exception("No data passed to server.");
            }
        }catch(Exception $e){
            console.log($e);
        }

        try {
            $adminID = $JSON["adminID"];
            $productID = $JSON["productID"];
            $name = $JSON["name"];
            $prodDesc = $JSON["prodDesc"];
            $unitPrice = $JSON["unitPrice"];
            $bulkPrice = $JSON["bulkPrice"];
            $bulkMinAmt = $JSON["bulkMinAmt"];
            $QOH = $JSON["QOH"];

            if(strpos($adminID, " ") > 0){
                throw new Exception("adminID cannot contain white space");
            }
            if(strpos($productID, " ") > 0){
                throw new Exception("productID cannot contain white space");
            }
        }catch(Exception $e){
            console.log($e);
        }

        $DAO = new EditProductDAO();
        $user = $DAO->update($adminID,$productID,$name,$prodDesc,$unitPrice,$bulkPrice,$bulkMinAmt,$QOH);

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