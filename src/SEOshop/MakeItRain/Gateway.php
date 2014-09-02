<?php

namespace SEOshop\MakeItRain;

abstract class Gateway implements GatewayInterface
{
    protected $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    /**
     * Get the available configuration for this gateway
     *
     * @return array
     */
    public function getConfig()
    {
        if ($reflectionClass = new \ReflectionClass($this))
        {
            $configFile = dirname($reflectionClass->getFileName()).'/config.json';

            if (file_exists($configFile))
            {
                return json_decode(file_get_contents($configFile), true);
            }
        }

        return [];
    }

    public function getServices()
    {
        return $this->config['services'];
    }

    /**
     * Retrieve the configuration of this gateway
     *
     * @return array
     */
    public function configAction()
    {
        return $this->getConfig();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function toArray()
    {
        return [
            'id'        => $this->getId(),
            'title'     => $this->getTitle(),
            'services'  => $this->getServices()
        ];
    }
}