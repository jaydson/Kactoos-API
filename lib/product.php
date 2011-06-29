<?php

class Product{

    public $product_id;
    public $product_country_id;
    public $country_id;
    public $name;
    public $msrp_price;
    public $shipping_cost;
    public $time;
    public $active;
    public $highlight;
    public $warranty;
    public $introduction;
    public $views;
    public $stock;
    public $date;
    public $description;
    public $image;
    public $group_id;
    public $group_begin_date;
    public $group_end_date;
    public $begin_price;
    public $actual_price;
    public $total_users;
    public $url;
    public $short_url;
    public $price;

    public function productId($value = null){
        if($value != null){
            $this->product_id = $value;
        }
        return $this;
    }

    public function productCountryId($value = null){
        if($value != null){
            $this->product_country_id = $value;
        }
        return $this;
    }

    public function countryId($value = null){
        if($value != null){
            $this->country_id = $value;
        }
        return $this;
    }

    public function name($value = null){
        if($value != null){
            $this->name = $value;
        }
        return $this;
    }
    
    public function msrpPrice($value = null){
        if($value != null){
            $this->msrp_price = $value;
        }
        return $this;
    }

    public function shippingCost($value = null){
        if($value != null){
            $this->shipping_cost = $value;
        }
        return $this;
    }
    
    public function time($value = null){
        if($value != null){
            $this->time = $value;
        }
        return $this;
    }
    
    public function active($value = null){
        if($value != null){
            $this->active = $value;
        }
        return $this;
    }

    public function highlight($value = null){
        if($value != null){
            $this->highlight = $value;
        }
        return $this;
    }

    public function warranty($value = null){
        if($value != null){
            $this->warranty = $value;
        }
        return $this;
    }

    public function introduction($value = null){
        if($value != null){
            $this->introduction = $value;
        }
        return $this;
    }

    public function views($value = null){
        if($value != null){
            $this->views = $value;
        }
        return $this;
    }

    public function stock($value = null){
        if($value != null){
            $this->stock = $value;
        }
        return $this;
    }

    public function date($value = null){
        if($value != null){
            $this->date = $value;
        }
        return $this;
    }

    public function description($value = null){
        if($value != null){
            $this->description = $value;
        }
        return $this;
    }

    public function image($value = null){
        if($value != null){
            $this->image = $value;
        }
        return $this;
    }

    public function groupId($value = null){
        if($value != null){
            $this->group_id = $value;
        }
        return $this;
    }

    public function groupBeginDate($value = null){
        if($value != null){
            $this->group_begin_date = $value;
        }
        return $this;
    }

    public function groupEndDate($value = null){
        if($value != null){
            $this->group_end_date = $value;
        }
        return $this;
    }

    public function beginPrice($value = null){
        if($value != null){
            $this->begin_price = $value;
        }
        return $this;
    }

    public function actualPrice($value = null){
        if($value != null){
            $this->actual_price = $value;
        }
        return $this;
    }

    public function totalUsers($value = null){
        if($value != null){
            $this->total_users = $value;
        }
        return $this;
    }

    public function url($value = null){
        if($value != null){
            $this->url = $value;
        }
        return $this;
    }

    public function shortUrl($value = null){
        if($value != null){
            $this->short_url = $value;
        }
        return $this;
    }

    public function price($value = null){
        if($value != null){
            $this->price = $value;
        }
        return $this;
    }
}
