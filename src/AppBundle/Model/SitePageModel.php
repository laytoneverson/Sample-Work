<?php

namespace AppBundle\Model;

class SitePageModel
{
    /**
     * @var string
     */
    private $pageName;

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

    public function __construct(array $pageConfig)
    {
        //Set config vars
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
}
