<?php
function __autoload($class_name) {
    $file = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', 'lib/' . $class_name)). '.php';
    require_once($file);
}

echo '<pre>'; 
$kapi = new KactoosAPI();
$kapi->callbackUrl('http://tests.local/kactoos/api/sample_oauth.php')
     ->requestMethod('GET')
     ->consumerKey('acfa436d35a5ea89e6d2e4654ee0e94f04df8f181')
     ->consumerSecret('de9672074e2c2586376a2e9166743170')
     ->format('xml');
$kapi->auth();


/*
 * Sample code 1 - Get user friends
*/

echo '<h2>Get user friends</h2>';
print_r($kapi->getFriends());


/*
 * Sample code 2 - Get user favorite products
 */
echo '<h2>Get favorites</h2>';
print_r($kapi->getMyFavorites());
 

/*
 * Sample code 3 - Get user groups
 */
echo '<h2>Get user groups</h2>';
print_r($kapi->getMyGroups());


