<?php

namespace AppBundle\Services;

use AppBundle\Services\SessionStorageService;
use Symfony\Component\Form\FormFactory;

class FormBuilderService
{
    /**
     * @var array
     */
    protected $siteFormsConfig;

    /**
     * @var SessionStorageService $storage
     */
    protected $storage;

    /**
     * @var FormFactory
     */
    protected $formFactory;

    public function __construct(array $siteFormsConfig, SessionStorageService $storageService, FormFactory $formFactory)
    {
        $this->siteFormsConfig = $siteFormsConfig;
        $this->storage = $storageService;
        $this->formFactory = $formFactory;
    }

    public function buildForm($form)
    {
        $formConfig = $this->siteFormsConfig[$form];
        $data = $this->storage->getData($formConfig['model_class']);
        $form = $this->formFactory->create($formConfig['class']);

        return $form->createView();
    }
}
