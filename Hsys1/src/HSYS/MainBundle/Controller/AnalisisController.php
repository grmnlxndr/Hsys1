<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnalisisController extends Controller
{
    public function indexAction() {
        return $this->render('HSYSMainBundle:Analisis:index.html.twig');
    }
    
    public function nuevoAction() {
        $request = $this->getRequest();

        $analisis = new analisis();
        $form = $this->createForm(new analisisType(), $analisis);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($analisis);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_analisis'));
                //aca poner respuesta no se como
            }
        }
        return $this->render('HSYSMainBundle:Analisis:nuevo.html.twig', array('form' => $form->createView(),));
    }
}
