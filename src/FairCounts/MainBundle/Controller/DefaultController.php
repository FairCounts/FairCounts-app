<?php

namespace FairCounts\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FairCountsMainBundle:Default:index.html.twig', array());
    }
}
