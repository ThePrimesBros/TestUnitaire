<?php

namespace App\Entity;

use DateTime;

class User
{

    private $mail;

    private $name;

    private $prenom;

    private $birthday;

    private $password;


    public function __construct($mail, $name, $prenom, $birthday, $password)
    {
        $this->mail = $mail;
        $this->name = $name;
        $this->prenom = $prenom;
        $this->birthday = $birthday;
        $this->password = $password;
    }

    public function isValid(){
        $birthDate = $this->birthday;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthDate), date_create($today));

        if(empty($this->prenom)){
            return false;
        }else if(empty($this->name)){
            return false;
        }else if(empty($this->mail)){
            return false;
        }else if(!filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
            return false;
        }else if(is_null($this->birthday)){
            return false;
        }else if($diff->format('%y') < 13){
            return false;
        }else if(strlen($this->password) < 7 ){
            return false;
        }else if(strlen($this->password) > 40){
            return false;
        }else{
            return true;
        }
    }
}