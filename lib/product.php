<?php

class Product{

    private $product_id;
    private $product_country_id;
    private $country_id;
    private $name;
    private $msrp_price;
    private $shipping_cost;
    private $time;
    private $active;
    private $highlight;
    private $warranty;
    private $introduction;
    private $views;
    private $stock;
    private $date;
    private $description;
    private $image;
    private $group_id;
    private $group_begin_date;
    private $group_end_date;
    private $begin_price;
    private $actual_price;
    private $total_users;
    private $short_url;
    private $price;

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