<?php

namespace SEOshop\MakeItRain;

use SEOshop\MakeItRain\Gateway\Collection as GatewayCollection;

class Payment
{
    /**
     * Create a new Payment Instance
     */
    public function __construct()
    {
        // Code goes here
    }

    /**
     * Create a new Payment Instance
     *
     * @return Payment
     */
    public static function create()
    {
        $className = get_class();

        return new $className();
    }
    /**
     * Get a list of all the gateways
     *
     * @return GatewayCollection
     */
    public function getGateways()
    {
        if ($reflectionClass = new \ReflectionClass($this))
        {
            $configFile = dirname($reflectionClass->getFileName()).'/gateways.json';

            if (file_exists($configFile))
            {
                $types = json_decode(file_get_contents($configFile), true);
                $collection = new GatewayCollection();

                foreach ($types as $type => $items)
                {
                    foreach ($items as $item)
                    {
                        if ($gateway = $this->getGateway($item))
                        {
                            $collection->addGateway($gateway, $type);
                        }
                    }
                }

                return $collection;
            }
        }

        return [];
    }

    public function getMethods()
    {
        return [];
    }

    public function getGateway($gateway)
    {
        if (is_dir(__DIR__.'/Gateway/'.$gateway))
        {
            $className = '\SEOshop\MakeItRain\Gateway\\'.$gateway.'\\'.$gateway;

            return new $className();
        }
    }
}
