<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 7:12 PM
 */

class Products implements JsonSerializable{
    private $productID, $adminID, $name, $prodDesc, $unitPrice, $bulkPrice, $bulkMinAmt, $qoh,$dateAdded, $dateUpdated;

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getAdminID()
    {
        return $this->adminID;
    }

    /**
     * @param mixed $adminID
     */
    public function setAdminID($adminID)
    {
        $this->adminID = $adminID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProdDesc()
    {
        return $this->prodDesc;
    }

    /**
     * @param mixed $prodDesc
     */
    public function setProdDesc($prodDesc)
    {
        $this->prodDesc = $prodDesc;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param mixed $unitPrice
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed
     */
    public function getBulkPrice()
    {
        return $this->bulkPrice;
    }

    /**
     * @param mixed $bulkPrice
     */
    public function setBulkPrice($bulkPrice)
    {
        $this->bulkPrice = $bulkPrice;
    }

    /**
     * @return mixed
     */
    public function getBulkMinAmt()
    {
        return $this->bulkMinAmt;
    }

    /**
     * @param mixed $bulkMinAmt
     */
    public function setBulkMinAmt($bulkMinAmt)
    {
        $this->bulkMinAmt = $bulkMinAmt;
    }

    /**
     * @return mixed
     */
    public function getQoh()
    {
        return $this->qoh;
    }

    /**
     * @param mixed $qoh
     */
    public function setQoh($qoh)
    {
        $this->qoh = $qoh;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param mixed $dateAdded
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param mixed $dateUpdated
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    public function __construct($productID,$adminID,$name,$prodDesc, $unitPrice, $bulkPrice, $bulkMinAmt, $qoh,$dateAdded, $dateUpdated){
        $this->productID = $productID;
        $this->adminID = $adminID;
        $this->name = $name;
        $this->prodDesc = $prodDesc;
        $this->unitPrice = $unitPrice;
        $this->bulkPrice = $bulkPrice;
        $this->bulkMinAmt = $bulkMinAmt;
        $this->qoh = $qoh;
        $this->dateAdded = $dateAdded;
        $this->dateUpdated = $dateUpdated;
    }




    public function jsonSerialize()
    {
        return["productID"=>$this->productID, "adminID"=>$this->adminID,
            "name"=>$this->name, "prodDesc"=>$this->prodDesc,
            "unitPrice"=>$this->unitPrice, "bulkPrice"=>$this->bulkPrice,
            "bulkMinAmt"=>$this->bulkMinAmt, "QOH"=>$this->qoh, "dateAdded"=>$this->dateAdded,
            "dateUpdated"=>$this->dateUpdated];
    }
}