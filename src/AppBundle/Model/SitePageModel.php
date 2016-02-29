<?php

namespace AppBundle\Model;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;

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

    /**
     * @var string
     */
    private $newVersion;

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
        $this->setNewVersion(isset($pageConfig['new_version']) ? $pageConfig['new_version'] : 'default');
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
     * @param string $formName
     * @return Form
     */
    public function getPageForm($formName)
    {
        return $this->pageForms[$formName]['form'];
    }

    /**
     * @param string $formName
     * @return string
     */
    public function getPageFormClass($formName)
    {
        return $this->pageForms[$formName]['model_fqn'];
    }

    /**
     * @param $formName
     * @return FormView
     */
    public function getPageFormView($formName)
    {
        return $this->pageForms[$formName]['view'];
    }

    /**
     * @param $formName
     * @return mixed
     */
    public function getPageFormData($formName)
    {
        return $this->pageForms[$formName]['data'];
    }

    /**
     * @param string $formName
     * @param array $form
     * @return SitePageModel
     */
    public function addPageForm($formName, array $form)
    {
        $this->pageForms[$formName] = $form;

        return $this;
    }

    /**
     * @param string $pixelName
     * @return array|boolean
     */
    public function getPagePixel($pixelName)
    {
        if (isset($this->pagePixels[$pixelName])) {
            return $this->pagePixels[$pixelName];
        }

        return false;
    }

    /**
     * @param string $pixelName
     * @param PixelModel $pagePixel
     * @return SitePageModel
     */
    public function addPagePixels($pixelName, PixelModel $pagePixel)
    {
        $this->pagePixels[$pixelName] = $pagePixel;

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

    public function getNewVersion()
    {
        return $this->newVersion;
    }

    public function setNewVersion($setVersion)
    {
        $this->newVersion = $setVersion;

        return $this;
    }
}
