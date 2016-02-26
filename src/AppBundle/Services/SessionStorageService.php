<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionStorageService
{
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    public function storeData($key, $value)
    {
        $this->request->getSession()->set($key, serialize($value));
    }

    public function getData($key)
    {
        return unserialize($this->request->getSession()->get($key));
    }
}
