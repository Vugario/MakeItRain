<?php

namespace SEOshop\MakeItRain\Gateway;

use SEOshop\MakeItRain\Gateway;

class Collection
{
    /** @var array A list of all gateways divided per type [enabled, disabled, test] */
    protected $gateways = [];

    /**
     * Add a gateway to the Collection
     *
     * @param $gateway
     * @param string $type
     */
    public function addGateway($gateway, $type = 'disabled')
    {
        $this->gateways[$type][$gateway->getId()] = $gateway;
    }

    /**
     * Returns all enabled gateways
     *
     * @return mixed
     */
    public function filterByEnabled()
    {
        return $this->toArray($this->gateways['enabled']);
    }

    protected function toArray($items)
    {
        $output = [];

        /** @var Gateway $item */
        foreach ($items as $key => $item)
        {
            $output[$key] = $item->toArray();
        }

        return $output;
    }
}