<?php

namespace AppBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class SitePagesLoader extends Loader
{
    /**
     * @var bool
     */
    private $loaded = false;

    /**
     * @var array
     */
    private $sitePagesConfig;

    public function __construct(array $sitePages)
    {
        $this->sitePagesConfig = $sitePages;
    }

    public function load($resource, $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "Site Pages" loaded twice');
        }

        $routes = new RouteCollection();
        foreach ($this->sitePagesConfig as $pageName => $pageConfig) {
            if (!empty($pageConfig['page_handler']) && !empty($pageConfig['page_route'])) {
                $action = lcfirst($pageConfig['page_handler']);
                $route = new Route(
                    $pageConfig['page_route'],
                    ['_controller' => "AppBundle:Default:$action"],
                    []
                );
                $routes->add($pageName, $route);
            } else {
                throw new \RuntimeException("You are missing a page_handler or page_route parameter for $pageName!");
            }
        }

        $this->loaded = true;

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'site_pages' === $type;
    }
}
