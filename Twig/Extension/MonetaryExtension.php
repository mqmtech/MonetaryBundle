<?php

namespace MQM\MonetaryBundle\Twig\Extension;

use MQM\MonetaryBundle\Monetary\MonetaryManagerInterface;
use MQM\ToolsBundle\Utils;

class MonetaryExtension extends \Twig_Extension {
    
    private $monetaryManager;
    
    public function __construct(MonetaryManagerInterface $monetaryManager) {
        $this->monetaryManager = $monetaryManager;
    }
    
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName() {
        return 'monetary_twig_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions() {
        return array(
            'currencySymbol' => new \Twig_Function_Method($this, 'currencySymbol'),
            'noPriceAccess' => new \Twig_Function_Method($this, 'noPriceAccess'),
        );
    }
    
    public function getFilters() {
        return array(
            'roundoff' => new \Twig_Filter_Method($this, 'roundoff'),
            'toPrettyPrice' => new \Twig_Filter_Method($this, 'toPrettyPrice'),
        );
    }        
    
    /**
     *
     * @param string $string 
     */
    public function currencySymbol($currency = null)
    {
        return $currencySymbol = $this->monetaryManager->getCurrencySymbol($currency);        
    }
    
    public function noPriceAccess()
    {
        return $this->monetaryManager->getNoPriceAcessMessage();
    }    
    
    /**
     * @param float $number
     */
    public function roundoff($number)
    {
        return $this->monetaryManager->roundoffCurrency($number);
    }
    
    /**
     *
     * @param float $subject
     * @return string
     */
    public function toPrettyPrice($price)
    {
        return Utils::getInstance()->floatToPrettyFloat($price);
    }
}