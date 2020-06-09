<?php
class AddressBook{
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $zip;
    public $phoneNumber;

    function __construct($firstName,$lastName,$address,$city,$zip,$phoneNumber)
    {
        $this->firstName=$this->cleanUp($firstName);
        $this->lastName=$this->cleanUp($lastName);
        $this->address=$this->cleanUp($address);
        $this->city=$this->cleanUp($city);
        $this->zip=$this->cleanUp($zip);
        $this->phoneNumber=$this->cleanUp($phoneNumber);
   }

    function display(){
        echo "First Name: ".$this->firstName."<br>"."Last Name: ".$this->lastName."<br>"."Address: ".$this->address."<br>"."City: ".$this->city."<br>"."ZIP: ".$this->zip."<br>"."Phone Number: ".$this->phoneNumber;
    }

    function cleanUp($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

