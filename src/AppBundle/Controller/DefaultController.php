<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\HttpFoundation\OfferPageRequest as Request;

class DefaultController extends Controller
{
    public function displayPageAction(Request $request)
    {
        $sitePage = $request->getSitePage();

        return $this->render("default/".$sitePage->getPageTemplate(), [
            'page' => $sitePage,
        ]);
    }

    public function submitLeadAction(Request $request)
    {

    }

    public function processOrderAction(Request $request)
    {

    }

    public function setVersionAction(Request $request)
    {
        $sitePage = $request->getSitePage();
        $request->getSession()->set(
            'SiteVersion',
            $sitePage->getNewVersion()
        );

        return $this->redirect($sitePage->getForwardPageUrl());
    }
}
