<?php

require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__) . '/../kactoos-api.php';

/**
 * Test class for KactoosAPI.
 * Generated by PHPUnit on 2011-06-14 at 18:08:16.
 */
class KactoosAPITest extends PHPUnit_Framework_TestCase {

    /**
     * @var KactoosAPI
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new KactoosAPI;
        $this->object->apikey('8f14e45fceea167a5a36dedd4bea2543')
             ->country('br')
             ->module('products')
             ->appname('jaydson')
             ->format('xml');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed
     */
    protected function tearDown() {

    }

    /**
    * Test available formats
    */
    public function testIsValidFormat() {
         $this->assertTrue($this->object->isValidFormat('xml'));
         $this->assertTrue($this->object->isValidFormat('json'));
         $this->assertFalse($this->object->isValidFormat(null));
         $this->assertFalse($this->object->isValidFormat(''));
         $this->assertFalse($this->object->isValidFormat(array('a','b')));
    }
    
    /**
    * Test parse of params to build a well formatted string to concat with URL
    */
    public function testParseParams(){
        $this->assertEquals($this->object->parseParams(array(
                                                          'type'=>'categorie-name',
                                                          'search'=>'android'
                                                       )),'/type/categorie-name/search/android');
        
        $this->assertEquals($this->object->parseParams(array(
                                                          'type'=>'categorie-id',
                                                          'search'=>76
                                                       )),'/type/categorie-id/search/76');
    }
    
    /**
    * Test an well formatted URL to be passed to Kactoos API
    */
    public function testBuildURL(){
        $this->assertEquals($this->object
                                 ->buildURL('get-product-categories',
                                            array(
                                               'type'=>'categorie-name',
                                               'search'=>'android'
                                            )),'http://api.kactoos.com/br/api/products/get-product-categories/format/xml/appname/jaydson/apikey/8f14e45fceea167a5a36dedd4bea2543/type/categorie-name/search/android');
    }

    /**
     * Test requests for Kactoos API
     */
    public function testRequest() {
        $params = array('type'=>'categorie-name',
                        'search'=>'android');
        $this->assertType(PHPUnit_Framework_Constraint_IsType::TYPE_OBJECT, $this->object->request('get-product-categories', $params));
    }

    /**
     * Test valid country
     */
    public function testCountry() {
        $this->assertNotNull($this->object->country('br'));
    }

    /**
     * Test valid module
     */
    public function testModule() {
        $this->assertNotNull($this->object->module('products'));
    }

    /**
     * Test valid API KEY
     */
    public function testApikey() {
        $this->assertNotNull($this->object->apikey('8f14e45fceea167a5a36dedd4bea2543'));
    }

    /**
     * Test valid App Name
     */
    public function testAppname() {
        $this->assertNotNull($this->object->appname('jaydson'));
    }

    /**
     * Test valid Format
     */
    public function testFormat() {
        $this->assertNotNull($this->object->format('xml'));
    }

    /**
     * Test GetProductCategories, must return an ProductCategories object
     */
    public function testGetProductCategories() {
        
    }

    /**
     * @todo Implement testGetProductsByRange().
     */
    public function testGetProductsByRange() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetProductsCountry().
     */
    public function testGetProductsCountry() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetProductsMostBought().
     */
    public function testGetProductsMostBought() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetProductsMostViewed().
     */
    public function testGetProductsMostViewed() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @todo Implement testGetProductList().
     */
    public function testGetProductList() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}

?>
