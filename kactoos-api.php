<?php

class KactoosAPI{
	
	protected static $baseurl = 'http://api.kactoos.com';

	private $country;
	private $module;
	private $apikey;
	private $appname;
	private $format;
	protected static $available_formats = array('xml','json');
	
	public function __construct(){
	}
	
	/**
	* Development Stuff. Just print the current object formated
	*
	* @return void
	*/
	public function debug(){
		echo '<pre>';
		print_r($this);
		echo '</pre>';
	}
	
	/**
    * Verify format type support
    *
    * @param string $format
    * @return Boolean
    */
	static function isValidFormat($format){
		return ($format !== null || $format!== "")
        ? (in_array($format, self::$available_formats) ? true : false) : false;
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
	* Just build a valid and complete URL to consume Kactoos API 
	*
	* @param string $method
	* @param array $params
	* @return string
	*/
	protected function buildURL($method,$params){
		$optionsURL = '';
		if(sizeof($params) > 0){
			$optionsURL = $this->parseParams($params);
		}
		return self::$baseurl.'/'.$this->country.'/api/'.$this->module.'/'.$method.'/format/'.$this->format.'/appname/'.$this->appname.'/apikey/'.$this->apikey.$optionsURL;
	}
	
	/**
	* Verify if exists some error in document XML or JSON
	*
	* @param string $method
	* @param object $doc
	* @return string
	*/
	public function validateDoc($doc){	
		
	}
	
	/**
	* Make a request to Kactoos API. Methos is the name of available method. 
	* Params is an array with options
	*
	* @param string $method
	* @param array $params
	* @$format string [XML/JSON]
	* @return SimpleXmlElement
	*/
	public function request($method,$params){
		if(self::isValidFormat($this->format)){
			$url = $this->buildURL($method,$params);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$data = curl_exec($ch);
			if($data){
				
				if($this->format == 'xml'){
					$doc = new SimpleXmlElement($data);
				}else{
					$doc = json_decode($data);
				}
				return $doc;	
			}else{
				throw new Exception(curl_error($ch));
			}
		}else{
			throw new Exception('Must provide a valid format to request [XML or JSON]');
		}
		curl_close($ch);
	}
	
	public function country($country){
		if($country!=null){
			$this->country = $country;
		}else{
			throw new Exception('Must provide a valid coutry [br,co,mx,en]');
		}
		return $this;
	}
	
	public function module($module){
		if($module!=null){
			$this->module = $module;
		}else{
			throw new Exception('Must provide a valid module [products]');
		}
		return $this;
	}
			
	public function apikey($apikey){
		if($apikey!=null){
			$this->apikey = $apikey;
		}else{
			throw new Exception('Must provide a valid APIKEY [api.kactoos.com]');
		}
		return $this;
	}
	
	public function appname($appname){
		if($appname!=null){
			$this->appname = $appname;
		}else{
			throw new Exception('Must provide a valid AppName [api.kactoos.com]');
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

		// @todo - Im tired now... and i know that i need optimize this method, but for now, it works ;) 
		$response = $this->request('get-product-categories',$params);
		$product_categories = array();
		if($this->format == 'xml'){
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
			}
		}else{
			$size = sizeof($response->arrCategorias);
			if($size > 0){
				for($i=0;$i<$size;$i++){
					$productCategory = new ProductCategories();
					$productCategory->id((string)$response->arrCategorias[$i]->id_categoria)
									->idSubCategory((string)$response->arrCategorias[$i]->id_categoria_sub)
									->nameMaster((string)$response->arrCategorias[$i]->nombre_padre)
									->nameSubcategory((string)$response->arrCategorias[$i]->nombre_categoria_sub)
									->idCountry((string)$response->arrCategorias[$i]->id_pais)
									->productNumber((string)$response->arrCategorias[$i]->num_prod);
					$product_categories[] = $productCategory;
				}
			}
		}
		return $product_categories;
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
