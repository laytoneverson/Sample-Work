<?php

namespace AppBundle\Model;

use AppBundle\Services\PixelTrackingService;

class SitePageModel
{
    /**
     * @var string
     */
    private $pageName;

    /**
     * @var string
     */
    private $pageRoute;

    /**
     * @var string
     */
    private $pageHandler;

    /**
     * @var string
     */
    private $forwardPage;

    /**
     * @var string
     */
    private $forwardPageUrl;

    /**
     * @var string
     */
    private $exitPage;

    /**
     * @var string
     */
    private $exitPageUrl;

    /**
     * @var array
     */
    private $pageForms;

    /**
     * @var array
     */
    private $pagePixels;

    /**
     * @var string
     */
    private $pageTabTitle;

    /**
     * @var string
     */
    private $pageTemplate;



    public function __construct(array $pageConfig = null)
    {
        if (null !== $pageConfig) {
            $this->applyPageConfig($pageConfig);
        }
    }

    private function applyPageConfig(array $pageConfig)
    {
        $this->setPageTabTitle(isset($pageConfig['page_tab_title']) ? $pageConfig['page_tab_title'] : '');
        $this->setPageTemplate(isset($pageConfig['page_template']) ? $pageConfig['page_template'] : '');
        $this->setForwardPage(isset($pageConfig['forward_page']) ? $pageConfig['forward_page'] : '');
        $this->setExitPage(isset($pageConfig['exit_page']) ? $pageConfig['exit_page'] : '');
        $this->setPageRoute(isset($pageConfig['page_route']) ? $pageConfig['page_route'] : '');
        $this->setPageHandler(isset($pageConfig['page_handler']) ? $pageConfig['page_handler'] : 'DisplayPage');
    }

    /**
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * @param string $pageName
     * @return SitePageModel
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getForwardPage()
    {
        return $this->forwardPage;
    }

    /**
     * @param string $forwardPage
     * @return SitePageModel
     */
    public function setForwardPage($forwardPage)
    {
        $this->forwardPage = $forwardPage;

        return $this;
    }

    /**
     * @return string
     */
    public function getForwardPageUrl()
    {
        return $this->forwardPageUrl;
    }

    /**
     * @param string $forwardPageUrl
     * @return SitePageModel
     */
    public function setForwardPageUrl($forwardPageUrl)
    {
        $this->forwardPageUrl = $forwardPageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getExitPage()
    {
        return $this->exitPage;
    }

    /**
     * @param string $exitPage
     * @return SitePageModel
     */
    public function setExitPage($exitPage)
    {
        $this->exitPage = $exitPage;

        return $this;
    }

    /**
     * @return string
     */
    public function getExitPageUrl()
    {
        return $this->exitPageUrl;
    }

    /**
     * @param string $exitPageUrl
     * @return SitePageModel
     */
    public function setExitPageUrl($exitPageUrl)
    {
        $this->exitPageUrl = $exitPageUrl;

        return $this;
    }

    /**
     * @return array
     */
    public function getPageForms()
    {
        return $this->pageForms;
    }

    /**
     * @param array $pageForms
     * @return SitePageModel
     */
    public function setPageForms($pageForms)
    {
        $this->pageForms = $pageForms;

        return $this;
    }

    /**
     * @param $formName
     * @return SitePageModel
     */
    public function addPageForm($formName)
    {
        $this->pageForms[] = $formName;

        return $this;
    }

    /**
     * @return array
     */
    public function getPagePixels()
    {
        return $this->pagePixels;
    }

    /**
     * @param array $pagePixels
     * @return SitePageModel
     */
    public function setPagePixels($pagePixels)
    {
        $this->pagePixels = $pagePixels;

        return $this;
    }

    /**
     * @param $pagePixel
     * @return SitePageModel
     */
    public function addPagePixels($pagePixel)
    {
        $this->pagePixels[] = $pagePixel;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageTabTitle()
    {
        return $this->pageTabTitle;
    }

    /**
     * @param string $pageTabTitle
     * @return SitePageModel
     */
    public function setPageTabTitle($pageTabTitle)
    {
        $this->pageTabTitle = $pageTabTitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageTemplate()
    {
        return $this->pageTemplate;
    }

    /**
     * @param mixed $pageTemplate
     * @return SitePageModel
     */
    public function setPageTemplate($pageTemplate)
    {
        $this->pageTemplate = $pageTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getPageRoute()
    {
        return $this->pageRoute;
    }

    /**
     * @param string $pageRoute
     * @return SitePageModel
     */
    public function setPageRoute($pageRoute)
    {
        $this->pageRoute = $pageRoute;
        return $this;
    }

    /**
     * @return string
     */
    public function getPageHandler()
    {
        return $this->pageHandler;
    }

    /**
     * @param string $pageHandler
     * @return SitePageModel
     */
    public function setPageHandler($pageHandler)
    {
        $this->pageHandler = $pageHandler;

        return $this;
    }
}
