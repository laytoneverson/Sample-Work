<?php

namespace AppBundle\Services;

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

    public function __construct(
        array $siteFormsConfig,
        SessionStorageService $storageService,
        FormFactory $formFactory
    ){
        $this->siteFormsConfig = $siteFormsConfig;
        $this->storage = $storageService;
        $this->formFactory = $formFactory;
    }

    /**
     * @param string $formName
     * @return array
     */
    public function buildForm($formName)
    {
        $formConfig = $this->siteFormsConfig[$formName];
        $dataClass = $formConfig['model_class'];
        $data = $this->storage->getData($dataClass, new $dataClass);
        $form = $this->formFactory->create($formConfig['class'], $data);

        return [
            'model_fqn' => $dataClass,
            'data' => $data,
            'form' => $form,
            'view' => $form->createView()
        ];
    }
}
