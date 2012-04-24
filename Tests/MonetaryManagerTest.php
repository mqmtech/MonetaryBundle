<?php

namespace MQM\MonetaryBundle\Tests;



class MonetaryManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{   
    public function __construct()
    {
        parent::__construct();
        
        $client = static::createClient();
        $container = $client->getContainer();
        $this->_container = $container;  
    }
    
    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    protected function get($service)
    {
        return $this->_container->get($service);
    }
    
    public function testGetMonetaryManager()
    {
        $monetaryManager = $this->get('mqm_monetary.monetary_manager');
        $this->assertNotNull($monetaryManager);
    }
    
    public function testGetCurrency()
    {
        $monetaryManager = $this->get('mqm_monetary.monetary_manager');
        $currency = $monetaryManager->getCurrency();
        $this->assertEquals('euro', $currency);
    }
    
    public function testGetCurrencySymbol()
    {
        $monetaryManager = $this->get('mqm_monetary.monetary_manager');
        $currencySymbol = $monetaryManager->getCurrencySymbol();
        $this->assertEquals('€', $currencySymbol);
    }
    
    public function testGetRoundoffCurrency()
    {
        $monetaryManager = $this->get('mqm_monetary.monetary_manager');
        $roundoff = $monetaryManager->roundoffCurrency(0.5225);
        $this->assertEquals(0.52, $roundoff);
    }
    
    public function testNoPriceAccess()
    {
        $monetaryManager = $this->get('mqm_monetary.monetary_manager');
        $noPriceAccess = $monetaryManager->getNoPriceAcessMessage();
        $this->assertEquals('Consultar precio', $noPriceAccess);
    }
}
