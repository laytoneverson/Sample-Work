<?php

namespace AppBundle\Model;

class PixelModel
{
    /**
     * @var string
     */
    private $pixelName;

    /**
     * @var array
     */
    private $pixelVars;

    /**
     * @var string
     */
    private $pixelTemplate;

    /**
     * @return mixed
     */
    public function getPixelVars()
    {
        return $this->pixelVars;
    }

    public function getPixelVar($variableName)
    {
        if (!isset($this->pixelVars[$variableName])) {
            throw new \RuntimeException("Variable does not exist");
        }

        return $this->pixelVars[$variableName];
    }

    /**
     * @param $varName
     * @param $varValue
     * @return PixelModel
     */
    public function addPixelVar($varName, $varValue)
    {
        $this->pixelVars[$varName] = $varValue;

        return $this;
    }

    /**
     * @param mixed $pixelVars
     * @return PixelModel
     */
    public function setPixelVars($pixelVars)
    {
        $this->pixelVars = $pixelVars;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPixelName()
    {
        return $this->pixelName;
    }

    /**
     * @param mixed $pixelName
     * @return PixelModel
     */
    public function setPixelName($pixelName)
    {
        $this->pixelName = $pixelName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPixelTemplate()
    {
        return $this->pixelTemplate;
    }

    /**
     * @param string $pixelTemplate
     * @return PixelModel
     */
    public function setPixelTemplate($pixelTemplate)
    {
        $this->pixelTemplate = $pixelTemplate;

        return $this;
    }
}