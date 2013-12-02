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
	
	public function addUserAction($username, $password, $email){
		$userManager = $this->get('fos_user.user_manager');
		
		$user = $userManager->createUser();
		$user->setUsername($username);
		$user->setPassword($password);
		$user->setEmail($email);

		$userManager->updateUser($user);
		
		$this->getDoctrine()->getEntityManager()->flush();

		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $username));
	}
	
	public function loginAction($username, $password){
		$userManager = $this->get('fos_user.user_manager');
		
		$user = $userManager->findUserByUsername($username);
		
		if($user != null){
			if($user->getPassword() == $password){
				return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $user->getEmail()));
			}
			
		}
		
		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => "error"));
	}
}
