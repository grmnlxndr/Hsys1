<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\altaDonanteType;
use HSYS\MainBundle\Entity\Donante;
use Symfony\Component\HttpFoundation\Request;

class DonanteController extends Controller {

    public function nuevoAction() {
        $request = $this->getRequest();
        
        $donante = new Donante();
        $form = $this->createForm(new altaDonanteType(), $donante);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donante);
                $em->flush();
                return $this->redirect($this->generateURL('hsys_main_homepage',array('nombre'=>'tu mina')));
            }
        }
        return $this->render('HSYSMainBundle:Donante:nuevo.html.twig', array('form' => $form->createView(),));
    }

    
    public function confirmacionAction() {
        return $this->render('HSYSMainBundle:Donante:confirmacion.html.twig');
    }
}

?>
