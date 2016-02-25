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
     * @var TrackingPixelService
     */
    private $trackingPixelService;

    /**
     * @var SitePageModel
     */
    private $currentSitePage;

    public function __construct(Router $router, TrackingPixelService $trackingPixelService, array $sitePagesConfig)
    {
        $this->sitePagesConfig = $sitePagesConfig;
        $this->router = $router;
        $this->trackingPixelService = $trackingPixelService;
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
    public function decoratePage($pageName)
    {
        $pageConfig = $this->sitePagesConfig[$pageName];

        $sitePage = new SitePageModel($pageConfig);
        if (isset($pageConfig['page_pixels'])) {
            foreach($pageConfig['page_pixels'] as $pixelName => $pagePixelVariables) {
                $sitePage->addPagePixels($this->trackingPixelService->decoratePixel($pixelName, $pagePixelVariables));
            }
        }

        dump($sitePage);die();

        return $sitePage;
    }
}
