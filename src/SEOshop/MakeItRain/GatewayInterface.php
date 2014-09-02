<?php

namespace SEOshop\MakeItRain;

interface GatewayInterface
{
    /**
     * Initialise the gateway
     */
    public function init();

    /**
     * Returns the Gateway's ID
     *
     * @return string
     */
    public function getId();

    /**
     * Returns the Gateway's title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get all the available options for this gateway
     *
     * @return array
     */
    public function getConfig();
}