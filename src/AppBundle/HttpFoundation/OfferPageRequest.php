<?php

namespace AppBundle\HttpFoundation;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\SitePageModel;

class OfferPageRequest extends Request
{
    /**
     * @var SitePageModel
     */
    protected $sitePage;

    /**
     * @param SitePageModel $sitePageModel
     */
    public function setSitePage(SitePageModel $sitePageModel)
    {
        $this->sitePage = $sitePageModel;
    }

    /**
     * @return SitePageModel
     */
    public function getSitePage()
    {
        return $this->sitePage;
    }
}
