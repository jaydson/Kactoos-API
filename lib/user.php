<?php

class User{
    
    private $date;
    private $name;
    private $last_name;
    private $sex;
    private $username;
    private $country_acronym;
    private $avatar;

    public function date($value = null){
        if($value != null){
            $this->date = $value;
        }
        return $this;
    }

    public function name($value = null){
        if($value != null){
            $this->name = $value;
        }
        return $this;
    }

    public function lastName($value = null){
        if($value != null){
            $this->name = $value;
        }
        return $this;
    }

    public function sex($value = null){
        if($value != null){
            $this->sex = $value;
        }
        return $this;
    }

    public function userName($value = null){
        if($value != null){
            $this->username = $value;
        }
        return $this;
    }

    public function countryAcronym($value = null){
        if($value != null){
            $this->country_acronym = $value;
        }
        return $this;
    }

    public function avatar($value = null){
        if($value != null){
            $this->avatar = $value;
        }
        return $this;
    }
   
}