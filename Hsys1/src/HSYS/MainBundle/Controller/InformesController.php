<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InformesController extends Controller {

    public function indexAction() {
        return $this->render('HSYSMainBundle:Informes:index.html.twig');
    }

    public function informeanalisisAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $fecha = $request->request->get('fecha');
            $analisis = $em->getRepository('HSYSMainBundle:Analisis')->findAnalisisPorFecha($fecha);
            return $this->render('HSYSMainBundle:Informes:informeanalisisimprimir.html.twig', array('analisis' => $analisis, 'fecha' => $fecha,));
        }
        return $this->render('HSYSMainBundle:Informes:informeanalisis.html.twig');
    }

    public function informedescarteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $informe = $em->getRepository('HSYSMainBundle:Unidad')->generarDatosInformeDescarte($desde, $hasta);
            return $this->render('HSYSMainBundle:Informes:informedescarteimprimir.html.twig', array('informe' => $informe, 'desde' => $desde, 'hasta' => $hasta,));
        }
        return $this->render('HSYSMainBundle:Informes:informedescarte.html.twig');
    }

}
