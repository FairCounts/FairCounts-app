<?php

namespace FairCounts\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response as Reponse;
use Symfony\Component\HttpFoundation\Request;

class PasswordChangedController extends Controller
{
    public function passwordChangedAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->render('FairCountsUserBundle:ChangePassword:passwordChanged.html.twig', array());
        } else {
            return $this->render('FairCountsMainBundle:Main:welcome.html.twig', array());
        }
    }
}
