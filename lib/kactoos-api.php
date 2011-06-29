<?php

class KactoosAPI{
	
    protected static $baseurl = 'http://api.kactoos.com';
    protected static $siteUrl = 'http://api.kactoos.com/api/oauth/request_token';
    protected static $requestTokenUrl = 'http://api.kactoos.com/api/oauth/request_token';
    protected static $accessTokenUrl = 'http://api.kactoos.com/api/oauth/access_token';
    protected static $userAuthorizationUrl = 'http://api.kactoos.com/api/oauth/authorize';
    private $country;
    private $module;
    private $apikey;
    private $appname;
    private $format;    
    private $callbackUrl;
    private $requestMethod;
    private $consumerKey;
    private $consumerSecret;
    private $consumer;
    private $oauth_config;
    protected static $available_formats = array('xml','json');

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
    public function isValidFormat($format){
        return ($format !== null || $format!== "")
        ? (in_array($format, self::$available_formats) ? true : false) : false;
    }

    /**
    * Parse Params and build an valid string to put on URL
    *
    * @param array $params
    * @return string
    */
    public function parseParams($params){
        $urlPart = '';
        foreach ($params as $key => $value){
            if(isset($value)){
                $urlPart.='/'.$key . "/".$value;
            }
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
    public function buildURL($method,$params){
        $optionsURL = '';
        if(sizeof($params) > 0){
                $optionsURL = $this->parseParams($params);
        }
        return self::$baseurl.'/'.$this->country.'/api/'.$this->module.'/'.$method.'/oauth_consumer_key/'.$this->oauth_consumer_key.'/format/'.$this->format.$optionsURL;
    }

    /**
    * Make a request to Kactoos API. Method is the name of available method.
    * Params is an array with options
    *
    * @param string $method
    * @param array $params
    * @return SimpleXmlElement/StdClass
    */
    public function request($method,$params){
        if($this->isValidFormat($this->format)){
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

    public function requestScheme($requestScheme){
        if($requestScheme!=null){
                $this->requestScheme = $requestScheme;
        }else{
            throw new Exception('Must provide a valid requestScheme');
        }
        return $this;
    }

    public function requestMethod($requestMethod){
        if($requestMethod!=null){
                $this->requestMethod = $requestMethod;
        }else{
            throw new Exception('Must provide a valid requestScheme');
        }
        return $this;
    }

    public function consumerKey($consumerKey){
        if($consumerKey!=null){
                $this->consumerKey = $consumerKey;
        }else{
            throw new Exception('Must provide a valid consumerKey');
        }
        return $this;
    }

    public function consumerSecret($consumerSecret){
        if($consumerSecret!=null){
                $this->consumerSecret = $consumerSecret;
        }else{
            throw new Exception('Must provide a valid consumerSecret');
        }
        return $this;
    }

    public function callbackUrl($callbackUrl){
        if($callbackUrl!=null){
                $this->callbackUrl = $callbackUrl;
        }else{
            throw new Exception('Must provide a valid callbackUrl');
        }
        return $this;
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

    public function oauthConsumerKey($oauth_consumer_key){
        if($oauth_consumer_key!=null){
                $this->oauth_consumer_key = $oauth_consumer_key;
        }else{
            throw new Exception('Must provide a valid oauth_consumer_key [api.kactoos.com]');
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
    * Just parse an XML object to a Product Object
    *
    * @param  $xml_product
    * @return Product Object
    */
    public function parseProduct($xml_product){
        $product = new Product();
        $product->productId((string)$xml_product->id_product)
                ->productCountryId((string)$xml_product->id_product_country)
                ->countryId((string)$xml_product->id_country)
                ->name((utf8_decode((string)$xml_product->product_name)))
                ->msrpPrice((string)$xml_product->msrp_price)
                ->shippingCost((string)$xml_product->shipping_cost)
                ->time((string)$xml_product->estimated_time)
                ->active((string)$xml_product->active)
                ->highlight((string)$xml_product->highlight)
                ->warranty((string)$xml_product->warranty)
                ->introduction(utf8_decode((string)$xml_product->intro))
                ->views((string)$xml_product->views)
                ->stock((string)$xml_product->stock)
                ->date((string)$xml_product->date_created)
                ->description(utf8_decode((string)$xml_product->default_description))
                ->image((string)$xml_product->image)
                ->groupId((string)$xml_product->id_group)
                ->groupBeginDate((string)$xml_product->date_start)
                ->groupEndDate((string)$xml_product->date_end)
                ->beginPrice((string)$xml_product->initial_price)
                ->actualPrice((string)$xml_product->actual_price)
                ->url((string)$xml_product->url)
                ->shortUrl((string)$xml_product->short_url)
                ->price((string)$xml_product->price);
        return $product;
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
                                $productCategory->id((string)$response->category[$i]->id_category)
                                                ->idSubCategory((string)$response->category[$i]->sub_category_id)
                                                ->nameMaster(utf8_decode((string)$response->category[$i]->parent_category_name))
                                                ->nameSubcategory(utf8_decode((string)$response->category[$i]->sub_category_name))
                                                ->idCountry((string)$response->category[$i]->id_country)
                                                ->productNumber((string)$response->category[$i]->product_number);
                                $product_categories[] = $productCategory;
                        }
                }
        }else{
                $size = sizeof($response->arrCategorias);
                if($size > 0){
                        for($i=0;$i<$size;$i++){
                                $productCategory = new ProductCategories();
                                $productCategory->id((string)$response->arrCategorias[$i]->id_category)
                                                ->idSubCategory((string)$response->arrCategorias[$i]->sub_category_id)
                                                ->nameMaster(utf8_decode((string)$response->arrCategorias[$i]->parent_category_name))
                                                ->nameSubcategory(utf8_decode((string)$response->arrCategorias[$i]->sub_category_name))
                                                ->idCountry((string)$response->arrCategorias[$i]->id_country)
                                                ->productNumber((string)$response->arrCategorias[$i]->product_number);
                                $product_categories[] = $productCategory;
                        }
                }
        }
        return $product_categories;
    }

    /**
    * Get a list of product by especific range of price
    *
    * @param float $initial_range
    * @param float $end_range
    * @param sort string
    * @return Array (Product Objects)
    */
    public function getProductsByRange($initial_range,$end_range,$sort){
        if($sort != 'best-price'){ $sort = 'best-price'; }
        if($initial_range != null && $end_range != null){
            $params = array();
            $params['sort'] = $sort;
            $params['initial_range'] = $initial_range;
            $params['end_range'] = $end_range;
            $response = $this->request('get-products-by-range-price',$params);
            $products = array();
            if($this->format == 'xml'){
                    $size = sizeof($response);
                    if($size > 0){
                        for($i=0;$i<$size;$i++){
                            $products[] = $this->parseProduct($response->product[$i]);
                        }
                    }
            }
            return $products;
        }else{
            throw new Exception('Must provide a initial range and end range');
        }
    }

    /**
    * Get a list of product by especific country
    *
    * @param array $params
    * @return Array (Product Objects)
    */
    public function getProductsCountry($params){
        if(isset($params)){
            $response = $this->request('get-products-country',$params);
            $products = array();
            if($this->format == 'xml'){
                  $size = sizeof($response);
                    if($size > 0){
                        for($i=0;$i<$size;$i++){
                        $products[] = $this->parseProduct($response->product[$i]);
                    }
                }            
            }
            return $products;
        }else{
            throw new Exception('Must provide country name or country id');
        }
    }

    /**
    * Get a list of most bought products
    *
    * @param array $params
    * @return Array (Product Objects)
    */
    public function getProductsMostBought($params){
        if(isset($params)){
            $response = $this->request('get-products-most-bought',$params);
            $products = array();
            if($this->format == 'xml'){
                  $size = sizeof($response);
                    if($size > 0){
                        for($i=0;$i<$size;$i++){
                        $products[] = $this->parseProduct($response->product[$i]);
                    }
                }
            }
            return $products;
        }
     }

    /**
    * Get a list of most viewed products
    *
    * @param array $params
    * @return Array (Product Objects)
    */
    public function getProductsMostViewed($params){
        if(isset($params)){
            $response = $this->request('get-products-most-viewed',$params);
            $products = array();
            if($this->format == 'xml'){
                  $size = sizeof($response);
                    if($size > 0){
                        for($i=0;$i<$size;$i++){
                        $products[] = $this->parseProduct($response->product[$i]);
                    }
                }
            }
            return $products;
        }
    }

    /**
    * Get a list of products
    *
    * @param array $params
    * @return Array (Product Objects)
    */
    public function getProductList($params){
        if(isset($params)){
            $response = $this->request('get-product-list',$params);
            $products = array();
            if($this->format == 'xml'){
                  $size = sizeof($response);
                    if($size > 0){
                        for($i=0;$i<$size;$i++){
                        $products[] = $this->parseProduct($response->product[$i]);
                    }
                }
            }
            return $products;
        }
    }

    /**
    * Authentication with OAuth
    * @return void
    */
    public function auth(){
        session_start ();
        require_once 'Zend/Oauth/Consumer.php';
        $config = array(
            'callbackUrl' => $this->callbackUrl . '?access=true',
            'siteUrl' => self::$siteUrl,
            'requestScheme' => Zend_Oauth::REQUEST_SCHEME_QUERYSTRING,
            'requestMethod' => $this->requestMethod,
            'consumerKey' => $this->consumerKey,
            'consumerSecret' => $this->consumerSecret,
            "requestTokenUrl" => self::$requestTokenUrl,
            "accessTokenUrl" => self::$accessTokenUrl,
            'userAuthorizationUrl' => self::$userAuthorizationUrl
        );
        $this->oauth_config = $config;
        
        $this->consumer = new Zend_Oauth_Consumer( $config );
        $access = $_GET["access"];

        if( $access != "true" ){
            $token = $this->consumer->getRequestToken();
            $_SESSION['kactoos_token'] = serialize( $token );
            $this->consumer->redirect();
            exit();
        }

        if( isset ( $_SESSION["kactoos_token"] ) ){
            $token = $this->consumer->getAccessToken(
                 $_GET,
                 unserialize( $_SESSION['kactoos_token'] )
            );
            $_SESSION['kactoos_access_token'] = serialize( $token );
            unset( $_SESSION["kactoos_token"] );
        }
    }

    /**
    * Get a friend list of current auth user
    * @return Array (User objects)
    */
    public function getFriends(){
        if( isset ( $_SESSION['kactoos_access_token'] ) ) {
            $token = unserialize( $_SESSION['kactoos_access_token'] );

            $client = $token->getHttpClient( $this->oauth_config );
            $client->setUri(self::$baseurl.'/api/users/get-friends/format/'.$this->format);
            $client->setMethod( Zend_Http_Client::POST );
            $response = $client->request();
            $users = array();
            if($this->format == 'xml'){
                $data = new SimpleXMLElement($response->getBody());
                $size = sizeof($data);
                for($i=0;$i<$size;$i++){
                    $user = new User();
                    $user->name((string)$data->friend[$i]->api_nombre)
                         ->avatar((string)$data->friend[$i]->api_imagen)
                         ->countryAcronym((string)$data->friend[$i]->api_pais)
                         ->date((string)$data->friend[$i]->api_created_at)
                         ->lastName((string)$data->friend[$i]->api_apellido)
                         ->sex((string)$data->friend[$i]->api_sexo)
                         ->userName((string)$data->friend[$i]->api_username);
                    $users[] = $user;
                }
                return $users;
            }else{
                return $response->getBody();
            }         
        }
    }
    
    /**
    * Get a favorite list of current auth user
    * @return Array (Product objects)
    */
    public function getMyFavorites(){
        if( isset ( $_SESSION['kactoos_access_token'] ) ) {
            $token = unserialize( $_SESSION['kactoos_access_token'] );

            $client = $token->getHttpClient( $this->oauth_config );
            $client->setUri(self::$baseurl.'/api/users/get-my-favorites/format/'.$this->format);
            $client->setMethod( Zend_Http_Client::POST );
            $response = $client->request();
            $products = array();
            if($this->format == 'xml'){
                $data = new SimpleXMLElement($response->getBody());
                $size = sizeof($data);
                for($i=0;$i<$size;$i++){
                    $products[] = $this->parseProduct($data->product[$i]);
                }
                return $products;
            }else{
                return $response->getBody();
            }
        }
    }

    /**
    * Get a current group list of authenticated user
    * @return Array (Product objects)
    */
    public function getMyGroups(){
         if( isset ( $_SESSION['kactoos_access_token'] ) ) {
            $token = unserialize( $_SESSION['kactoos_access_token'] );

            $client = $token->getHttpClient( $this->oauth_config );
            $client->setUri(self::$baseurl.'/api/users/get-my-groups/format/'.$this->format);
            $client->setMethod( Zend_Http_Client::POST );
            $response = $client->request();
            $products = array();
            if($this->format == 'xml'){
                $data = new SimpleXMLElement($response->getBody());
                $size = sizeof($data);
                for($i=0;$i<$size;$i++){
                    $products[] = $this->parseProduct($data->product[$i]);
                }
                return $products;
            }else{
                return $response->getBody();
            }
        }
    }
}
