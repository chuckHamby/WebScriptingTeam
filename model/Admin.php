<?php
/**
 * Created by PhpStorm.
 * User: Chuck Hamby
 * Date: 4/13/2018
 * Time: 1:59 PM
 */

class Admin implements JsonSerializable{

    private $username;
    private $password;
    private $name;
    private $activeIndicator;
    private $createdDate;
    private $lastUpdated;
    private $email;

    public function __construct($uname,$pwd,$name,$activeIndicator,$createdDate,$lastUpdated,$email){
        $this->password = $pwd;
        $this->username = $uname;
        $this->name = $name;
        $this->activeIndicator = $activeIndicator;
        $this->createdDate = $createdDate;
        $this->lastUpdated = $lastUpdated;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getActiveIndicator()
    {
        return $this->activeIndicator;
    }

    /**
     * @param mixed $activeIndicator
     */
    public function setActiveIndicator($activeIndicator)
    {
        $this->activeIndicator = $activeIndicator;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return mixed
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param mixed $lastUpdated
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return["username"=>$this->username, "password"=>$this->password,
            "name"=>$this->name, "activeIndicator"=>$this->activeIndicator,
            "createdDate"=>$this->createdDate, "lastUpdated"=>$this->lastUpdated,
            "email"=>$this->email];
    }
}