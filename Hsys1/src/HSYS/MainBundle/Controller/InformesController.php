<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InformesController extends Controller
{
    public function indexAction(){
        return $this->render('HSYSMainBundle:Informes:index.html.twig');
    }
    
    public function informeanalisisAction(){
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST'){
            $em = $this->getDoctrine()->getEntityManager();
            $fecha = $request->request->get('fecha');
            $analisis = $em->getRepository('HSYSMainBundle:Analisis')->findAnalisisPorFecha($fecha);
            return $this->render('HSYSMainBundle:Informes:informeanalisisimprimir.html.twig', array('analisis'=>$analisis, 'fecha'=>$fecha,));
        }
        return $this->render('HSYSMainBundle:Informes:informeanalisis.html.twig');
    }
}
