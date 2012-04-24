<?php

namespace MQM\MonetaryBundle\Monetary;

use MQM\MonetaryBundle\Monetary\MonetaryManagerInterface;
use MQM\ToolsBundle\IO\PropertiesInterface;



class MonetaryManager implements MonetaryManagerInterface
{    
    private $config;
    private $locale;
    private $currency;
    
    public function __construct(PropertiesInterface $config, $locale = 'es')
    {
        $this->config = $config;
        $this->locale = $locale;
    }
        
    /**
     * {@inheritDoc}
     */
    public function roundoffCurrency($number)
    {
        $roundoff = (float)($number * 100.0) + (float) 0.5;
        $roundoff = (floor($roundoff) / 100.0);
        
        return $roundoff;
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrency()
    {
        $this->currency = $this->config->getProperty('currency_' . $this->locale);
         
        return $this->currency;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getCurrencySymbol()
    {
        $currency = $this->getCurrency();
        $currencySymbol = $this->config->getProperty('currency_symbol_' . $currency);
                
        return $currencySymbol;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getNoPriceAcessMessage()
    {
        return $this->config->getProperty('no_price_access');                
    }
}