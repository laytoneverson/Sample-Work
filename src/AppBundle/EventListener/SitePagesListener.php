<?php

namespace AppBundle\EventListener;

use AppBundle\HttpFoundation\OfferPageRequest as Request;
use AppBundle\Services\SitePagesService;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class SitePagesListener
{
    /**
     * @var array
     */
    protected $pageConfig;

    /**
     * @var SitePagesService
     */
    protected $sitePagesService;

    public function __construct(array $pageConfig, SitePagesService $sitePagesService)
    {
        $this->pageConfig = $pageConfig;
        $this->sitePagesService = $sitePagesService;
    }

    public function onKernelRequest(GetResponseEvent $getResponseEvent)
    {
        /** @var \AppBundle\HttpFoundation\OfferPageRequest $request */
        $request = $getResponseEvent->getRequest();
        $route = $request->attributes->get('_route');

        if ($sitePage = $this->sitePagesService->buildPage($route)) {
            $request->setSitePage($sitePage);
        }
    }
}
