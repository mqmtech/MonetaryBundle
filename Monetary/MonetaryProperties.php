<?php

namespace MQM\MonetaryBundle\Monetary;

use MQM\ToolsBundle\IO\PropertiesInterface;

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

    public function parse($path = null)
    {
        return $this;
    }

    public function setProperty($property, $value)
    {
        self::$CONFIG[$property] = $value;
        
        return $this;
    }
}