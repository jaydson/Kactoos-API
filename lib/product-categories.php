<?php
	
class ProductCategories{

    public $id;
    public $id_sub;
    public $name_master;
    public $name_sub;
    public $country_id;
    public $product_number;

    public function id($id = null){
        if($id != null){
            $this->id = $id;
        }
        return $this;
    }

    public function idSubCategory($id_sub = null){
        if($id_sub != null){
             $this->id_sub = $id_sub;
        }
        return $this;
    }

    public function nameMaster($name_master = null){
        if($name_master != null){
             $this->name_master = $name_master;
        }
        return $this;
    }

    public function nameSubcategory($name_sub = null){
        if($name_sub != null){
             $this->name_sub = $name_sub;
        }
        return $this;
    }

    public function idCountry($country_id = null){
        if($country_id != null){
             $this->country_id = $country_id;
        }
        return $this;
    }

    public function productNumber($product_number = null){
        if($product_number != null){
             $this->product_number = $product_number;
        }
        return $this;
    }
	
}
