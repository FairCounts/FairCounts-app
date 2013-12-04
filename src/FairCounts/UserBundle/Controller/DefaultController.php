<?php

namespace FairCounts\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FairCounts\MainBundle\Entity\FolderOfExpense;
use FairCounts\MainBundle\Entity\Expense;

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
		$user->setUsername($email);
		$user->setPlainPassword($password);
		$user->setEmail($email);
		$user->setEnabled(true);

		$userManager->updateUser($user);
		
		$this->getDoctrine()->getEntityManager()->flush();

		return $this->render('FairCountsUserBundle:Default:index.html.twig', array('name' => $username));
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
	
	public function createFolderAction(){
		$user = $this->container->get('security.context')->getToken()->getUser();
		
		if($user != null){
		
			$label = $this->getRequest()->query->get('folderLabel'); // Récupération du label du formulaire
			$users = $this->getRequest()->query->get('memberUsers'); // Récupération des users du formulaire
		
			$folder = new FolderOfExpense(); // On créer un nouvel objet folder
			$folder->setLabel($label);

			foreach( $users as $user ) { // On ajoute tous les users membres
				$folder->addUser($user);
			}

			$em = $this->getDoctrine()->getManager();
			$em->persist($folder);
			$em->flush();
		}
	}
}
