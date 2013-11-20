<?php

namespace FairCounts\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $name));
    }
	
	public function testAction($name)
	{
		$userManager = $this->get('fos_user.user_manager');
		
		$user = $userManager->findUserByUsername($name);
		
		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $user->getEmail()));
	}
	
	public function addUserAction($name){
		$userManager = $this->get('fos_user.user_manager');
		
		$user = $userManager->createUser();
		$user->setUsername($name);
		$user->setPassword("toto");
		$user->setEmail('john.doe@example.com');

		$userManager->updateUser($user);
		
		$this->getDoctrine()->getEntityManager()->flush();

		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $name));
	}
}
