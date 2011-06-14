<?php 
	
include 'kactoos-api.php';

$kapi = new KactoosAPI();
$kapi->apikey('8f14e45fceea167a5a36dedd4bea2543')
     ->country('br')
     ->module('products')
     ->appname('cosa')
     ->format('xml')
     ->debug();
     
print_r($kapi->getProductCategories('categorie-id',64));
