<?php

namespace FairCounts\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response as Reponse;
use Symfony\Component\HttpFoundation\Request;

class PasswordResetController extends Controller
{
    public function passwordResetAction()
    {
        if ($this->get('security.context')->isGranted('ROLE_USER')) {
            return $this->render('FairCountsUserBundle:Resetting:passwordReset.html.twig', array());
        } else {
            return $this->render('FairCountsMainBundle:Default:welcome.html.twig', array());
        }
    }
}
