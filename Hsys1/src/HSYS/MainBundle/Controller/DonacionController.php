<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonacionType;
use HSYS\MainBundle\Entity\Donacion;

//use Symfony\Component\HttpFoundation\Request;

class DonacionController extends Controller {

    public function indexAction() {
        return $this->render('HSYSMainBundle:Donacion:index.html.twig');
    }
    
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

    public function modificarAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $donacion = $em->getRepository('HSYSMainBundle:donacion')->find($id);
        //hacer mas lindo el error
        if (!$donacion) {
            throw $this->createNotFoundException(
                    'No se encontro la donacion: ' . $id
            );
        }

        $form = $this->createForm(new DonacionType(), $donacion);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em->persist($donacion);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_donacion'));
            } else {
                return 'no es valido';
            }
        }

        return $this->render('HSYSMainBundle:Donacion:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,));
    }

}

?>