<?php 
function __autoload($class_name) {
	$file = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $class_name)). '.php';
    require_once($file);
}

$kapi = new KactoosAPI();
$kapi->apikey('8f14e45fceea167a5a36dedd4bea2543')
     ->country('br')
     ->module('products')
     ->appname('cosa')
     ->format('json')
     ->debug();
	 $kapi->getProductCategories('categorie-name','beleza');
