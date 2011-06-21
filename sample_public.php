<?php 
function __autoload($class_name) {
    $file = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', 'lib/' . $class_name)). '.php';
    require_once($file);
}

$kapi = new KactoosAPI();
$kapi->oauthConsumerKey('acfa436d35a5ea89e6d2e4654ee0e94f04df8f181')
     ->country('br')
     ->module('products')
     ->format('xml');

echo '<pre>';

/*
 * Sample code 1 - Get Product Categories with a specific name search
 
$sample1 = $kapi->getProductCategories('categorie-name','android');
echo '<h2>Get Product Categories with a specific name search</h2>';
print_r($sample1);
*

/*
 * Sample code 2 - Get Product Categories with a specific id search
 
$sample2 = $kapi->getProductCategories('categorie-id',64);
echo '<h2>Get Product Categories with a specific id search</h2>';
print_r($sample2);
*/

/*
 * Sample code 3 - Get all Product Categories

$sample3 = $kapi->getProductCategories();
echo '<h2>Get all Product Categories</h2>';
print_r($sample3);
 */

/*
 * Sample code 4 - Get Products by Range Price

$sample4 = $kapi->getProductsByRange(900, 1100, 'best-price');
echo '<h2> Get Products by Range Price</h2>';
print_r($sample4);
*/

/*
 * Sample code 5 - Get Products by Country

$sample5 = $kapi->getProductsCountry(array('id_country'=>4,
                                           'start' => 3,
                                           'orderby' => '01/01/2011',
                                           'limit'=>10));
echo '<h2> Get Products by Country</h2>';
print_r($sample5);
 * */

/*
 * Sample code 6 - Get Products most bought

$sample6 = $kapi->getProductsMostBought(array('start' => 3,
                                           'orderby' => 'date',
                                           'limit'=>3));
echo '<h2> Get Products most Bought</h2>';
print_r($sample6);
*/

/*
 * Sample code 7 - Get Products most bought

$sample7 = $kapi->getProductsMostViewed(array('start' => 3,
                                           'orderby' => 'date',
                                           'limit'=>3));
echo '<h2> Get Products most Viewed</h2>';
print_r($sample7);
 * */


/*
 * Sample code 8 - Get Product list by new products
*/
$sample8= $kapi->getProductList(array('orderby' => 'new-products',
                                      'limit'=>2));
echo '<h2> Get Produc List order by new products</h2>';
print_r($sample8);

/*
 * Sample code 9 - Get Product list by date
*/
$sample9= $kapi->getProductList(array('orderby' => 'date',
                                      'limit'=>2));
echo '<h2> Get Produc List order by date</h2>';
print_r($sample9);

/*
 * Sample code 10 - Get Product list by popular
*/
$sample10= $kapi->getProductList(array('orderby' => 'popular',
                                      'limit'=>2));
echo '<h2> Get Produc List order by popular</h2>';
print_r($sample10);

/*
 * Sample code 11 - Get Product list by economic
*/
$sample11= $kapi->getProductList(array('orderby' => 'economic',
                                      'limit'=>2));
echo '<h2> Get Produc List order by economic</h2>';
print_r($sample11);
 
 
