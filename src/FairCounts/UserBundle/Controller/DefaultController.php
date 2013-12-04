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
		$user->sePlainPassword($password);
		$user->setEmail($email);

		$userManager->updateUser($user);
		
		$this->getDoctrine()->getEntityManager()->flush();

		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $username));
	}
	
	public function loginAction($username, $password){
		$userManager = $this->get('fos_user.user_manager');
		
		$session = $this->getRequest()->getSession();
		
		$user = $userManager->findUserByUsername($username);
		
		if($user != null){
			
			$encoder_service = $this->get('security.encoder_factory');
			$encoder = $encoder_service->getEncoder($user);
			$encoded_pass = $encoder->encodePassword($password, $user->getSalt());
		
			if($user->getPassword() == $encoded_pass){
			
				$session->set('userLogin', $username);
			
				// TODO: Rediriger vers la page d'accueil
				return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $user->getEmail()));
			}
		}
		
		// TODO: Rediriger vers page d'erreur
		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => "error"));
	}
	
	public function getUserFoldersAction(){
		
		$session = $this->getRequest()->getSession();
		$userManager = $this->get('fos_user.user_manager');
		
		$username = $session->get('userLogin');
		
		if($username != null){
			$user = $userManager->findUserByUsername($username);
			
			return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $user->getNumberOfFolders()));
		}
		
		// TODO: Rediriger vers page d'erreur
		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => "error"));
	}
}
