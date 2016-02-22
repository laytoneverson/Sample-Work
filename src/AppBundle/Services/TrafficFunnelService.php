<?php

namespace AppBundle\Services;
use AppBundle\Model\SitePageModel;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class SitePagesService
{
    /**
     * Array of values for each page in the the sales funnel that holds what input forms, tracking pixels,
     * and urls are needed for the current page.
     *
     * @var array
     */
    private $sitePagesConfig;

    /**
     * @var Router $router
     */
    private $router;

    /**
     * @var PixelTrackingService
     */
    private $pixelTrackingService;

    /**
     * @var SitePageModel
     */
    private $currentSitePage;

    public function __construct(Router $router, PixelTrackingService $pixelTrackingService, array $sitePagesConfig)
    {
        $this->sitePages = $sitePagesConfig;
        $this->router = $router;
        $this->pixelTrackingService = $pixelTrackingService;
    }

    /**
     * Pull application configuration parameters from the traffic_funnel.yml file to determine
     * links and assets used in the current page to move the customer through the traffic funnel.
     *
     * @param string $funnelPage
     * @return array
     */
    public function decoratePage($funnelPage = '')
    {
        if (empty($this->sitePages[$funnelPage])) {
            throw new \RuntimeException('Page configuration not found!');
        }

        $pageConfig = $this->sitePages[$funnelPage];
        $sitePage = new SitePageModel($this->sitePages[$funnelPage]);

        return $sitePage;
    }
}
