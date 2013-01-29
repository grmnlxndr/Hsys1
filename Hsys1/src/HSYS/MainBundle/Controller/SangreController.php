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
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorId($buscar);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarid.html.twig', array('unidades'=>$unidades,'metodo'=>$metodo));
    }
    
    public function buscarTipoHemocomponenteAction(){
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $tiposhemocomponentes =$em->getRepository('HSYSMainBundle:TipoHemocomponente')->findAll();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod()=='POST'){
            $metodo = true;
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadTipoHemocomponente($buscar);
        };        
        return $this->render('HSYSMainBundle:Sangre:buscartipohemocomponente.html.twig',array('unidades'=>$unidades, 'metodo'=>$metodo,'tiposhemocomponentes'=>$tiposhemocomponentes));
    }
    
    public function buscarEstadoAction(){
        $request = $this->getRequest();
        $estados= \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $metodo = false;
        $unidades = array();
        if ($request->getMethod()=='POST'){
            $em = $this->getDoctrine()->getEntityManager();
            $metodo = true;
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorEstado($buscar);
        };        
        return $this->render('HSYSMainBundle:Sangre:buscarestado.html.twig',array('unidades'=>$unidades, 'metodo'=>$metodo,'estados'=>$estados));
    }
    
}
