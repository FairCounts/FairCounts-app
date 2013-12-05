<?php

namespace FairCounts\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
          return $this->render('FairCountsMainBundle:Default:index.html.twig', array());
        } else {
          return $this->render('FairCountsMainBundle:Default:welcome.html.twig', array());
        }
    }
    
    public function welcomeAction()
    {
        return $this->render('FairCountsMainBundle:Default:welcome.html.twig', array());
    }
}
