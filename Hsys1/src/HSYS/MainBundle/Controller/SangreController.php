<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

class SangreController extends Controller {

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Sangre:index.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
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

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
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

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
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

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscarFechaAction() {
        $request = $this->getRequest();
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $metodo = true;
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadRangoFecha($desde, $hasta);
        };
        return $this->render('HSYSMainBundle:Sangre:buscarfecha.html.twig', array('unidades' => $unidades, 'metodo' => $metodo));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
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
        return $this->render('HSYSMainBundle:Sangre:buscardonacion.html.twig', array('unidades' => $unidades, 'metodo' => $metodo));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $estados = $unidad->estadosPosibles();
        return $this->render('HSYSMainBundle:Sangre:ver.html.twig', array('unidad' => $unidad, 'estados' => $estados));
    }

    /**
     * 	@Secure(roles="ROLE_MEDICO")
     */
    public function desbloquearAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $analisis = $unidad->getDonacion()->getAnalisis();
        if (!$analisis) {
            return $this->render('HSYSMainBundle:Sangre:error.html.twig', array('razon' => 'Todavía no se ha realizado un análisis de esta unidad'));
        }
        if ($request->getMethod() == 'POST') {
            $unidad->setEstado("Desbloqueado");
            $fecha = $request->request->get('fecha');
            $fechadesbloqueo = new \DateTime;
            $fechadesbloqueo->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
            $unidad->setFechadesbloqueo($fechadesbloqueo);
            $comentarios = $request->request->get('comentarios');
            $unidad->setComentarios($comentarios);
            $em->persist($unidad);
            $em->flush();
            return $this->render('HSYSMainBundle:Sangre:confirmacion.html.twig', array('id' => $unidad->getId(), 'accion' => 'desbloqueada'));
        }

        return $this->render('HSYSMainBundle:Sangre:desbloquear.html.twig', array('unidad' => $unidad, 'estados' => $estados));
    }

    /**
     * 	@Secure(roles="ROLE_MEDICO")
     */
    public function transfundirAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        if ($request->getMethod() == 'POST') {
            $unidad->setEstado("Transfundido");
            $em->persist($unidad);
            $em->flush();
            return $this->render('HSYSMainBundle:Sangre:confirmacion.html.twig', array('id' => $unidad->getId(), 'accion' => 'transfundida'));
        }
        return $this->render('HSYSMainBundle:Sangre:transfundir.html.twig', array('unidad' => $unidad, 'estados' => $estados));
    }

    /**
     * 	@Secure(roles="ROLE_MEDICO")
     */
    public function desecharAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $causadescarte = \HSYS\MainBundle\Entity\causadescarte::$causadescarte;
        if ($request->getMethod() == 'POST') {
            $unidad->setEstado("Descartado");
            $fecha = $request->request->get('fecha');
            $fechadescarte = new \DateTime;
            $fechadescarte->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
            $unidad->setFechadescarte($fechadescarte);
            $comentarios = $request->request->get('comentarios');
            $unidad->setComentarios($comentarios);
            $causa = $request->request->get('causadescarte');
            $unidad->setCausadescarte($causa);
            $em->persist($unidad);
            $em->flush();
            return $this->render('HSYSMainBundle:Sangre:confirmacion.html.twig', array('id' => $unidad->getId(), 'accion' => 'descartada'));
        }
        return $this->render('HSYSMainBundle:Sangre:desechar.html.twig', array('unidad' => $unidad, 'estados' => $estados, 'causadescarte' => $causadescarte));
    }

    /**
     * 	@Secure(roles="ROLE_MEDICO")
     */
    public function bloquearAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        if ($request->getMethod() == 'POST') {
            $unidad->setEstado("Bloqueado");
            $comentarios = $request->request->get('comentarios');
            $unidad->setComentarios($comentarios);
            $em->persist($unidad);
            $em->flush();
            return $this->render('HSYSMainBundle:Sangre:confirmacion.html.twig', array('id' => $unidad->getId(), 'accion' => 'bloqueada'));
        }
        return $this->render('HSYSMainBundle:Sangre:bloquear.html.twig', array('unidad' => $unidad, 'estados' => $estados));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscaravanzadaAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $tiposhemocomponentes = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findAll();
        $estados = \HSYS\MainBundle\Entity\estadoUnidad::$estados;
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $metodo = true;
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $estado = $request->request->get('estado');
            $tipo = $request->request->get('tipo');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadAvanzada($desde, $hasta, $estado, $tipo);
        };
        return $this->render('HSYSMainBundle:Sangre:buscaravanzada.html.twig', array('unidades' => $unidades, 'metodo' => $metodo, 'estados' => $estados, 'tiposhemocomponentes' => $tiposhemocomponentes));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscarfactorsanguineoAction() {
        $request = $this->getRequest();
        $factorsang = \HSYS\MainBundle\Entity\factorsang::$factorsang;
        $metodo = false;
        $unidades = array();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $metodo = true;
            $buscar = $request->request->get('buscar');
            $unidades = $em->getRepository('HSYSMainBundle:Unidad')->findUnidadFactorSangui($buscar);
        }
        return $this->render('HSYSMainBundle:Sangre:buscarfactorsangui.html.twig', array('unidades' => $unidades, 'metodo' => $metodo, 'factorsang' => $factorsang));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function crearfraccionamientoAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = new \HSYS\MainBundle\Entity\Unidad;
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);

        if ($unidad->getTipoHemocomponente() != 'Sangre Entera')
            throw $this->createNotFoundException(
                    'La Unidad con el codigo: ' . $id . ', no es una Sangre Entera, por favor seleccione una Sangre Entera para realizar el fraccionamiento'
            );
        $donacion = new \HSYS\MainBundle\Entity\Donacion;
        $donacion = $unidad->getDonacion();
        if ($request->getMethod() == 'POST') {
            $volumen = $request->request->get('volumen');
            $idtipohemo = $request->request->get('tipohemocomponente');
            $tipohemocomponente = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->find($idtipohemo);
            $tipobolsa = $unidad->getTipobolsa();
            $nrolote = $unidad->getNrolote();
            $marca = $unidad->getMarca();
            $anticoagulante = $unidad->getAnticoagulante();
            $cantidaddedias = $request->request->get('cantidaddedias');
            $vencimientobolsa = $unidad->getVencimientobolsa();
            $factorsanguineo = $request->request->get('factorsanguineo');
            $donacion->crearUnidad($tipohemocomponente, $volumen, $tipobolsa, $nrolote, $marca, $anticoagulante, $vencimientobolsa, $cantidaddedias, null, $factorsanguineo);
            $donacion->setFactores($factorsanguineo);
            $donante = $donacion->getDonante();
            $donante->setFactorSang($factorsanguineo);
            $unidad->setFactorsang($factorsanguineo);
            $em->persist($donacion);
            $em->flush();
        }
        $tiposhemocomponentes = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findAll();
        $unidades = $donacion->getUnidades();
        //MIRAR UNA FORMA MEJOR...
        foreach ($unidades as $uni) {
            $tipohemo = $uni->getTipoHemocomponente();
            $i = 0;
            while ($i <= count($tiposhemocomponentes)) {
                if ($tiposhemocomponentes[$i] == $tipohemo) {
                    unset($tiposhemocomponentes[$i]);
                    break;
                } else {
                    $i++;
                }
            }
            $tiposhemocomponentes = array_values($tiposhemocomponentes);
        }

        $factorsanguineo = \HSYS\MainBundle\Entity\factorsang::$factorsang;
        return $this->render('HSYSMainBundle:Sangre:crearfraccionamiento.html.twig', array('unidad' => $unidad, 'tiposhemocomponentes' => $tiposhemocomponentes, 'unidades' => $unidades, 'factorsanguineo' => $factorsanguineo));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function confirmacionfracionamientoAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = new \HSYS\MainBundle\Entity\Unidad;
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        $unidad->setEstado("Fraccionado");
        $em->persist($unidad);
        $em->flush();
        return $this->render('HSYSMainBundle:Sangre:confirmacion.html.twig', array('id' => $unidad->getId(), 'accion' => 'se ha creado el fraccionamiento'));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function imprimiretiquetaAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $unidad = $em->getRepository('HSYSMainBundle:Unidad')->find($id);
        return $this->render('HSYSMainBundle:Sangre:impresionetiqueta.html.twig', array('unidad' => $unidad));
    }

}

?>
