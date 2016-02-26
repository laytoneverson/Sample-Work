<?php

namespace AppBundle\Services;

class FormBuilderService
{
    /**
     * @var array
     */
    protected $siteFormsConfig;

    public function __construct(array $siteFormsConfig)
    {
        $this->siteFormsConfig = $siteFormsConfig;
    }

}
