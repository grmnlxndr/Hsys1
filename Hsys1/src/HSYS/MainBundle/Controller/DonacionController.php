<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonacionType;
use HSYS\MainBundle\Entity\Donacion;
//use Symfony\Component\HttpFoundation\Request;

class DonacionController extends Controller {

    public function nuevoAction() {
        $request = $this->getRequest();

        $donacion = new Donacion();
        $form = $this->createForm(new DonacionType(), $donacion);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donacion);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_donacion'));
                //aca poner respuesta no se como
            }
        }
        return $this->render('HSYSMainBundle:Donacion:nuevo.html.twig', array('form' => $form->createView(),));
    }

}
?>
