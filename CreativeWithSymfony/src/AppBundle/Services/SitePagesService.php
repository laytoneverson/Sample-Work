<?php

namespace AppBundle\Services;

use AppBundle\Model\SitePageModel;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Templating\EngineInterface;

/**
 * Prepare and manage the SitePagesModel
 *
 * Class SitePagesService
 * @package AppBundle\Services
 */
class SitePagesService
{
    //... I left the constructor so you can get an idea of what happens in this service

    /**
     * SitePagesService constructor.
     * @param Router $router
     * @param TrackingPixelService $trackingPixelService
     * @param array $sitePagesConfig
     * @param EngineInterface $twig
     * @param FormBuilderService $formBuilderService
     */
    public function __construct(
        Router $router,
        TrackingPixelService $trackingPixelService,
        array $sitePagesConfig,
        EngineInterface $twig,
        FormBuilderService $formBuilderService
    ) {
        $this->sitePagesConfig = $sitePagesConfig;
        $this->router = $router;
        $this->trackingPixelService = $trackingPixelService;
        $this->twig = $twig;
        $this->formBuilderService = $formBuilderService;
    }


    /**
     * Create anew SitePageModel, apply configuration parameters, and prepare it for render. Markup is not rendered
     * yet.
     *
     * @param string $pageName
     * @return SitePageModel
     */
    public function buildPage($pageName)
    {
        if (empty($pageName) || !isset($this->sitePagesConfig[$pageName])) {
            return false;
        }

        $pageConfig = $this->sitePagesConfig[$pageName];
        $sitePage = new SitePageModel($pageConfig);

        if (isset($pageConfig['page_pixels'])) {
            foreach($pageConfig['page_pixels'] as $pixelName => $pagePixelVariables) {
                $sitePage->addPagePixels(
                    $pixelName,
                    $this->trackingPixelService->decoratePixel($pixelName, $pagePixelVariables)
                );
            }
        }

        if (isset($pageConfig['forward_page'])) {
            $sitePage->setForwardPageUrl($this->router->getGenerator()->generate($pageConfig['forward_page']));
        }

        if (isset($pageConfig['exit_page'])) {
            $sitePage->setExitPageUrl($this->router->getGenerator()->generate($pageConfig['exit_page']));
        }

        if (isset($pageConfig['page_forms'])) {
            foreach ($pageConfig['page_forms'] as $pageForm) {
                $sitePage->addPageForm(
                    $pageForm,
                    $this->formBuilderService->buildForm($pageForm)
                );
            }
        }

        return $sitePage;
    }
}
