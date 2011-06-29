<?php

class User{
    
    public $date;
    public $name;
    public $last_name;
    public $sex;
    public $username;
    public $country_acronym;
    public $avatar;

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