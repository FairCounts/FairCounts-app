<?php
namespace FairCounts\UserBundle\EventListener;

use FOS\UserBundle\Event\UserEvent as UserEvent;

class RegistrationListener
{
    public function overrideUsername(UserEvent $args)
    {
        $request = $args->getRequest();
        $formFields = $request->get('fos_user_registration_form');
        $request->request->set('fos_user_registration_form', $formFields);
    }
}