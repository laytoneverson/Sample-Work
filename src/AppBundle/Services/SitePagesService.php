<?php

namespace AppBundle\Services;
use AppBundle\Model\SitePageModel;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * Prepare
 *
 * Class SitePagesService
 * @package AppBundle\Services
 */
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
        $this->sitePagesConfig = $sitePagesConfig;
        $this->router = $router;
        $this->pixelTrackingService = $pixelTrackingService;
    }

    /**
     * Apply site version over rides to page configuration.
     *
     * @param $siteVersion
     */
    public function applyConfigOverrides($siteVersion)
    {

    }

    /**
     * Create anew SitePageModel, apply configuration parameters, and prepare it for render. Markup is not rendered
     * yet.
     *
     * @param string $pageName
     * @return SitePageModel
     */
    public function decoratePage($pageName = '')
    {
        if (empty($this->sitePagesConfig[$pageName])) {
            throw new \RuntimeException('Page configuration not found!');
        }

        $pageConfig = $this->sitePagesConfig[$pageName];
        $sitePage = new SitePageModel($this->sitePagesConfig[$pageName]);
        $sitePage->configureTrackingPixels($this->pixelTrackingService);

        return $sitePage;
    }
}
