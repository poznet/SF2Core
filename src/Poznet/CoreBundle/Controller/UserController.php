<?php

namespace Poznet\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    
    /**
     * @Template()
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');
      $error = $authenticationUtils->getLastAuthenticationError();
      $lastUsername = $authenticationUtils->getLastUsername();
        return array(  'last_username' => $lastUsername, 'error'         => $error,);  
        
    }
    
    
    public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
        return array();
    }
    
    public function logoutAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
        return $this->redirectToRoute('index');
    }
}
