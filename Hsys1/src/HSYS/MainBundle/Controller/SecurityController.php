<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Security controller.
 *
 * @Route("/")
 */
class SecurityController extends Controller {

    /**
     * Definimos las rutas para el login:
     * @Route("/login", name="login")
     * @Route("/login_check", name="login_check")
     */
    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

// obtiene el error de inicio de sesión si lo hay
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('HSYSMainBundle:Security:login.html.twig', array('last_username' => $session->get(SecurityContext::LAST_USERNAME), 'error' => $error,));
    }

    /**
     * Definimos las rutas para el login:
     * @Route("/logout", name="logout")
     *
     */
    public function logoutAction() {
        return $this->redirect($this->generateUrl("hsys_main_homepage"));
    }

}

?>