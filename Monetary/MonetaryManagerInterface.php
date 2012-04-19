<?php

namespace MQM\MonetaryBundle\Monetary;

interface MonetaryManagerInterface
{    
    /**
     * @param float $number
     * @return float
     */
    public function roundoffCurrency($number);

    /**
     *
     * @return float
     */
    public function getCurrency();
    
    /**
     * @return string
     */
    public function getCurrencySymbol();
    
    /**
     * @return string 
     */
    public function getNoPriceAcessMessage();
}