<?php

namespace MQM\MonetaryBundle\Monetary;

use MQM\MonetaryBundle\Monetary\PropertiesInterface;

final class MonetaryProperties implements PropertiesInterface
{
    public static $CONFIG = array(
        'currency_es' => 'euro',
        'currency_us' => 'dollar',
        'currency_symbol_euro' => '€',
        'dollar_symbol_dollar' => '$',
        'no_access' => 'No Disponible',
        'no_price_access' => 'Consultar precio'
    );

    /**
     * {@inheritDoc}
     */
    public function getProperty($name)
    {
      if (isset(self::$CONFIG[$name]))
            return self::$CONFIG[$name];  
      
      return null;
    }
}