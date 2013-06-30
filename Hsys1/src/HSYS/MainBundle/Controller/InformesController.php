<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JMS\SecurityExtraBundle\Annotation\Secure;

class InformesController extends Controller {

    /**
    * 	@Secure(roles="ROLE_MEDICO")
    * 	@Secure(roles="ROLE_BIOQUIMICO")
    */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Informes:index.html.twig');
    }

    /**
    * 	@Secure(roles="ROLE_BIOQUIMICO")
    */
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

    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
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

    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
    public function informedesbloqueoAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $informe = $em->getRepository('HSYSMainBundle:Unidad')->generarDatosInformeDesbloqueo($desde, $hasta);
            return $this->render('HSYSMainBundle:Informes:informedesbloqueoimprimir.html.twig', array('informe' => $informe, 'desde' => $desde, 'hasta' => $hasta,));
        }
        return $this->render('HSYSMainBundle:Informes:informedesbloqueo.html.twig');
    }

    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
    public function informevoluntarioAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $informe = $em->getRepository('HSYSMainBundle:Donante')->generarDatosInformeVoluntario();
            return $this->render('HSYSMainBundle:Informes:informevoluntarioimprimir.html.twig', array('informe' => $informe));
        }
        return $this->render('HSYSMainBundle:Informes:informevoluntario.html.twig');
    }

    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
    public function informeextraccionAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $informe = $em->getRepository('HSYSMainBundle:Donacion')->generarDatosInformeExtraccion($desde, $hasta);
            return $this->render('HSYSMainBundle:Informes:informeextraccionimprimir.html.twig', array('informe' => $informe, 'desde' => $desde, 'hasta' => $hasta,));
        }
        return $this->render('HSYSMainBundle:Informes:informeextraccion.html.twig');
    }

    /**
    * 	@Secure(roles="ROLE_MEDICO")
    */
    public function informevencimientoAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $fecha = $request->request->get('fecha');
            $informe = $em->getRepository('HSYSMainBundle:Unidad')->generarDatosInformeVencimiento($fecha);
            return $this->render('HSYSMainBundle:Informes:informevencimientoimprimir.html.twig', array('informe' => $informe, 'fecha' => $fecha,));
        }
        return $this->render('HSYSMainBundle:Informes:informevencimiento.html.twig');
    }

    /**
    * 	@Secure(roles="ROLE_MEDICO")
    */
    public function informestockAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $informe = $em->getRepository('HSYSMainBundle:Unidad')->generarDatosInformeStock();
            return $this->render('HSYSMainBundle:Informes:informestockimprimir.html.twig', array('informe' => $informe));
        }
        return $this->render('HSYSMainBundle:Informes:informestock.html.twig');
    }

}
