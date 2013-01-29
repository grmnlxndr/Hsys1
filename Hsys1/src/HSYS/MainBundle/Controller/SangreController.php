<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SangreController extends Controller
{
    public function indexAction() {
        return $this->render('HSYSMainBundle:Sangre:index.html.twig');
    }
    
    public function buscaridAction(){
        $request = $this->getRequest();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod()=='POST'){
            $metodo = true;
            $em = $this->getDoctrine()->getEntityManager();
            $criterio = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorId($criterio);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarid.html.twig', array('unidades'=>$unidades,'metodo'=>$metodo));
    }
    
    public function buscarTipoHemocomponenteAction(){
        return $this->render('HSYSMainBundle:Sangre:buscartipohemocomponente.html.twig',array('unidades'=>$unidades, 'metodo'=>$metodo,'tiposhemocomponentes'=>$tiposhemocomponentes));
    }
    
}
