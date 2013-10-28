<?php

namespace FairCounts\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use FairCounts\UserBundle\Entity\SocialUser;

class UserController extends Controller
{
	public function createAction()
	{
		$s_user = new SocialUser();
		
		$s_user->setToken("benoit");
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($s_user);
		$em->flush();

		return new Response('Created user id '.$s_user->getId());
	}
}

?>