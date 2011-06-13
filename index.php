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
			echo '<pre>';
			print_r($doc);
			curl_close($ch); 
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
		* Load product categories
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
			$this->request('get-product-categories',$params);
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
	
	$kapi = new KactoosAPI();
	$kapi->apikey('8f14e45fceea167a5a36dedd4bea2543')
	     ->country('br')
	     ->module('products')
	     ->appname('cosa')
	     ->format('xml')
	     ->debug();
	     
	$kapi->getProductCategories('categorie-name','droid');
	
?>
