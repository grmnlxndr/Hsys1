<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SangreController extends Controller {

    public function indexAction() {
        return $this->render('HSYSMainBundle:Sangre:index.html.twig');
    }

    public function buscaridAction() {
        $request = $this->getRequest();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $metodo = true;
            $em = $this->getDoctrine()->getEntityManager();
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorId($buscar);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarid.html.twig', array('unidades' => $unidades, 'metodo' => $metodo));
    }

    public function buscarTipoHemocomponenteAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $tiposhemocomponentes = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findAll();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $metodo = true;
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadTipoHemocomponente($buscar);
        };
        return $this->render('HSYSMainBundle:Sangre:buscartipohemocomponente.html.twig', array('unidades' => $unidades, 'metodo' => $metodo, 'tiposhemocomponentes' => $tiposhemocomponentes));
    }

    public function buscarEstadoAction() {
        $request = $this->getRequest();
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $metodo = true;
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorEstado($buscar);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarestado.html.twig', array('unidades' => $unidades, 'metodo' => $metodo, 'estados' => $estados));
    }

    public function buscarFechaAction() {
        $request = $this->getRequest();
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $metodo = true;
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadRangoFecha($desde, $hasta);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarfecha.html.twig', array('unidades' => $unidades, 'metodo' => $metodo, 'estados' => $estados));
    }

    public function buscardonacionAction() {
        $request = $this->getRequest();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $metodo = true;
            $em = $this->getDoctrine()->getEntityManager();
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadPorDonacion($buscar);
        };
        return $this->render('HSYSMainBundle:Sangre:Buscardonacion.html.twig', array('unidades' => $unidades, 'metodo' => $metodo));
    }

    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = new \HSYS\MainBundle\Entity\Unidad;
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        
        
        
        return $this->render('HSYSMainBundle:Sangre:ver.html.twig', array('Unidad' => $unidad));  
    }
    
    
}
?>
