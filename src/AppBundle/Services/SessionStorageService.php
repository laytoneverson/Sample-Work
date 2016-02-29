<?php

namespace AppBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;
use AppBundle\HttpFoundation\OfferPageRequest as Request;

class SessionStorageService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * SessionStorageService constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function storeData($key, $value)
    {
        $this->request->getSession()->set($key, serialize($value));
    }

    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public function getData($key, $default = null)
    {
        return unserialize($this->request->getSession()->get($key, $default));
    }
}
