<?php

class KactoosAPI{
	
	protected static $baseurl = 'http://api.kactoos.com';

	private $country;
	private $module;
	private $apikey;
	private $appname;
	private $format;
	
	public function __construct(){
	}
	
	public function debug(){
		echo '<pre>';
		print_r($this);
		echo '</pre>';
	}
	
	/**
	* Parse Params and build an valid string to put on URL
	*
	* @param array $params
	* @return string
	*/
	protected function parseParams($params){
		$urlPart = '';
		foreach ($params as $key => $value){
			$urlPart.='/'.$key . "/".$value;
		}
		return $urlPart;
	}
	
	/**
	* Make a request to Kactoos API. Methos is the name of available method. 
	* Params is an array with options
	*
	* @param string $method
	* @param array $params
	* @return SimpleXmlElement
	*/
	public function request($method,$params){
		$optionsURL = '';
		if(sizeof($params) > 0){
			$optionsURL = $this->parseParams($params);
		}
		$url = self::$baseurl.'/'.$this->country.'/api/'.$this->module.'/'.$method.'/format/'.$this->format.'/appname/'.$this->appname.'/apikey/'.$this->apikey.$optionsURL;
		echo $url;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		$doc = new SimpleXmlElement($data);
		curl_close($ch);
		return $doc;
	}
	
	public function country($country){
		if($country!=null){
			$this->country = $country;
		}
		return $this;
	}
	
	public function module($module){
		if($module!=null){
			$this->module = $module;
		}
		return $this;
	}
			
	public function apikey($apikey){
		if($apikey!=null){
			$this->apikey = $apikey;
		}
		return $this;
	}
	
	public function appname($appname){
		if($appname!=null){
			$this->appname = $appname;
		}
		return $this;
	}
	
	public function format($format){
		if($format!=null){
			$this->format = $format;
		}
		return $this;
	}
	
	/**
	* Get a list of product categories
	*
	* @param string $type["categorie-id" or "categorie-name"]
	* @param string $search
	* @return ProductCategories Object
	*/
	public function getProductCategories($type=null,$search=null){
		$params = array();
		if($type != null){
			$params['type']=$type;
		}
		if($search != null){
			$params['search']=$search;
		}
		require_once('product-categories.php');
		$response = $this->request('get-product-categories',$params);
		$product_categories = array();
		$size = sizeof($response);
		if($size > 0){
			for($i=0;$i<$size;$i++){
				$productCategory = new ProductCategories();
				$productCategory->id((string)$response->category[$i]->id_categoria)
							    ->idSubCategory((string)$response->category[$i]->id_categoria_sub)
							    ->nameMaster((string)$response->category[$i]->nombre_padre)
							    ->nameSubcategory((string)$response->category[$i]->nombre_categoria_sub)
							    ->idCountry((string)$response->category[$i]->id_pais)
							    ->productNumber((string)$response->category[$i]->num_prod);
				$product_categories[] = $productCategory;
			}
			return $product_categories;
		}
	}
	
	public function getProductsByRange(){
	
	}
	
	public function getProductsCountry(){
	
	}
	
	public function getProductsMostBought(){
	
	}
	
	public function getProductsMostViewed(){
	
	}
	
	public function getProductList(){
	
	}
}
