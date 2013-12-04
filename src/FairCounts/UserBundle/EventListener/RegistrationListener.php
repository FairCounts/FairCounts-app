<?php
namespace FairCounts\UserBundle\EventListener;

use FOS\UserBundle\Event\UserEvent as UserEvent;

class RegistrationListener
{
    public function overrideUsername(UserEvent $args)
    {
        $request = $args->getRequest();
        $formFields = $request->get('fos_user_registration_form');
        // here you can define specific email, ex:
        $username = $formFields['email'];
        $formFields['username'] = $username;
        $request->request->set('fos_user_registration_form', $formFields);
    }
}