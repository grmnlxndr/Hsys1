<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonanteType;
use HSYS\MainBundle\Entity\Donante;
use Symfony\Component\HttpFoundation\Request;

class DonanteController extends Controller {

    public function nuevoAction() {
        $request = $this->getRequest();

        $donante = new Donante();
        $form = $this->createForm(new DonanteType(), $donante);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donante);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion'));
//aca poner respuesta no se como
            }
        }
        return $this->render('HSYSMainBundle:Donante:nuevo.html.twig', array('form' => $form->createView(),));
    }

    public function modificarAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $em->flush();
            return $this->redirect($this->generateURL('confirmacion'));
        }
        
        $donante = $em->getRepository('HSYSMainBundle:donante')->find($id);
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $id
            );
        }

        $form = $this->createForm(new DonanteType(), $donante);
        return $this->render('HSYSMainBundle:Donante:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,));
    }

    public function confirmacionAction() {
        return $this->render('HSYSMainBundle:Donante:confirmacion.html.twig');
    }

}

?>
