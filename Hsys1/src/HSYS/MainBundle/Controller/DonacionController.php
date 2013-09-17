<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonacionType;
use HSYS\MainBundle\Entity\Donacion;
use HSYS\MainBundle\Entity\Unidad;
//use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DonacionController extends Controller {

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Donacion:index.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function nuevoAction() {
        return $this->render('HSYSMainBundle:Donacion:nuevo.html.twig');
    }

//    /**
//     * 	@Secure(roles="ROLE_ADMIN")
//     */
//    public function modificarAction($id) {
//        $request = $this->getRequest();
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $donacion = $em->getRepository('HSYSMainBundle:donacion')->find($id);
//        //hacer mas lindo el error
//        if (!$donacion) {
//            throw $this->createNotFoundException(
//                    'No se encontro la donacion: ' . $id
//            );
//        }
//
//        $form = $this->createForm(new DonacionType(), $donacion);
//
//        if ($request->getMethod() == 'POST') {
//            $form->bindRequest($request);
//            if ($form->isValid()) {
//                $em->persist($donacion);
//                $em->flush();
//                return $this->redirect($this->generateURL('confirmacion_donacion'));
//            } else {
//                return 'no es valido';
//            }
//        }
//
//        return $this->render('HSYSMainBundle:Donacion:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,));
//    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscarNumeroAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $numero = $request->request->get('numDonacion');
            if ($numero == '') {
                return $this->redirect($this->generateUrl('pagina_donacion'));
            } else {
                $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorId($numero);
                return $this->render('HSYSMainBundle:Donacion:buscarNumero.html.twig', array('donaciones' => $donaciones,));
            }
        } else {
            return $this->redirect($this->generateUrl('pagina_donacion'));
        }
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscarDonanteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donacion:buscarDonante.html.twig', array('donantes' => $donantes));
        }
        return $this->render('HSYSMainBundle:Donacion:buscarDonante.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function buscarFechaAction() {
        $request = $this->getRequest();
        $donaciones = null;
        $desde = null;
        $hasta = null;
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorRangoDeFecha($desde, $hasta);
        }
        return $this->render('HSYSMainBundle:Donacion:buscarFecha.html.twig', array('donaciones' => $donaciones));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function voluntariaAction() {
        return $this->render('HSYSMainBundle:Donacion:voluntaria.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function voluntariaDonanteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donacion:voluntariaDonante.html.twig', array('donantes' => $donantes,));
        } else {
            return $this->redirect($this->generateUrl('pagina_donacion'));
        }
    }

//    /**
//     * 	@Secure(roles="ROLE_PERSONAL")
//     */
//    public function voluntariaFormularioAction($id) {
//        $em = $this->getDoctrine()->getEntityManager();
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
//        //hacer mas lindo el error
//        if (!$donante) {
//            throw $this->createNotFoundException(
//                    'No se encontro el donante: ' . $id
//            );
//        }
//        $hospitales = \HSYS\MainBundle\Entity\Hospital::$hospitales;
//        $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
//        return $this->render('HSYSMainBundle:Donacion:voluntariaFormulario.html.twig', array('donante' => $donante, 'hospitales' => $hospitales, 'responsables' => $responsables));
//    }
//
//    /**
//     * 	@Secure(roles="ROLE_PERSONAL")
//     */
//    public function voluntariaFormularioGuardarAction() {
//        $request = $this->getRequest();
//        $numdedonacion = $request->request->get('numdedonacion');
//        $idDonante = $request->request->get('donante');
//        $fecha = $request->request->get('fecha');
//        $hospital = $request->request->get('hospital');
//        $peso = $request->request->get('peso');
//        $tensionarterial = $request->request->get('tensionarterial');
//        $pulso = $request->request->get('pulso');
//        $temperatura = $request->request->get('temperatura');
//        $hto = $request->request->get('hto');
//        $obs = $request->request->get('obs');
//        $idbolsa = $request->request->get('bolsa');
//        $nrolote = $request->request->get('nrolote');
//        $vencimiento = $request->request->get('vencimiento');
//        $tipobolsa = $request->request->get('tipobolsa');
//        $marca = $request->request->get('marca');
//        $anticoagulante = $request->request->get('anticoagulante');
//        $tipodonacion = $request->request->get('tipodonacion');
//        $inspeccionbrazos = $request->request->get('inspeccionbrazos');
//        $respCuestionario = $request->request->get('respCuestionario');
//        $respFisico = $request->request->get('respFisico');
//
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $donacion = new Donacion();
//        $donante = new \HSYS\MainBundle\Entity\Donante();
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
//        $donacion->setnumdedonacion($numdedonacion);
//        $donacion->setDonante($donante);
//        $donacion->setIdbolsa($idbolsa);
//        $fechaformat = new \DateTime;
//        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
//        $fechaformat->setTime(0, 0, 0);
//        $donacion->setFechextraccion($fechaformat);
//        $donacion->setHospital($hospital);
//        $donacion->setPeso($peso);
//        $donacion->setTensionarterial($tensionarterial);
//        $donacion->setPulso($pulso);
//        $donacion->setTemperatura($temperatura);
//        $donacion->setHto($hto);
//        $donacion->setInspeccionbrazos($inspeccionbrazos);
//        $donacion->setObs($obs);
//        $donacion->setTipodonacion($tipodonacion);
//
//        $fechaformatVenc = new \DateTime;
//        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
//        $fechaformatVenc->setTime(0, 0, 0);
//        $fechaVenc = $fechaformatVenc;
//
//        $donacion->setVencimientobolsa($fechaformatVenc);
//        $donacion->setNrolote($nrolote);
//        $donacion->setTipobolsa($tipobolsa);
//        $donacion->setMarca($marca);
//        $donacion->setAnticoagulante($anticoagulante);
//        $donacion->setRespCuestionario($respCuestionario);
//        $donacion->setRespFisico($respFisico);
//        $usr = $this->get('security.context')->getToken()->getUser();
//        $donacion->setRespDonacion($usr->getUsername());
//
//        $donacion->setTerminado(false);
//
//        $em->persist($donacion);
//        $em->flush();
//
//        $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
//
//        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion, 'responsables' => $responsables));
//    }
    //para leer el valor
    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function voluntariaFormularioContinuarAction($numdedonacion) {

        $em = $this->getDoctrine()->getEntityManager();

        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->findOneBy(array('numdedonacion' => $numdedonacion));
        $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();

        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion, 'responsables' => $responsables));
    }

//el encargado de crear una unidad tiene que ser la donacion, el metodo ya esta pero falta implementarlo en este controlador
    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function formConfirmarAction() {
        $request = $this->getRequest();
        $numdedonacion = $request->request->get('numdedonacion');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');
        $flebotomia = $request->request->get('flebotomia');
        $puncion = $request->request->get('puncion');
        $reaccionpostextraccion = $request->request->get('reaccionpostextraccion');
        $respExtraccion = $request->request->get('respExtraccion');

        $em = $this->getDoctrine()->getEntityManager();

        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->findOneBy(array('numdedonacion' => $numdedonacion));

        $donacion->setFlebotomia($flebotomia);
        $donacion->setPuncion($puncion);
        $donacion->setReaccionpostextraccion($reaccionpostextraccion);
        $donacion->setComentario($comentarios);
        $donacion->setRespExtraccion($respExtraccion);

//aca va el codigo. para los productos que se van a generar segun el tipo de donacion.
        switch ($donacion->getTipodonacion()) {
            case "Normal";
                $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
                break;
            case "Plaquetas Aféresis":
                $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Plaquetas'));
                break;
            case "Eritroférisis":
                $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'GRD'));
                break;
            case "Plasma Aférisis":
                $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Plasma Modificado'));
                break;

            default:
                $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
                break;
        }

        $donacion->crearUnidad($tipohemo, $volumen, $donacion->getTipobolsa(), $donacion->getNrolote(), $donacion->getMarcaBolsa(), $donacion->getAnticoagulante(), $donacion->getVencimientobolsa());

        $donacion->setTerminado(true);

        $em->persist($donacion);
        $em->flush();

        $donante = $donacion->getDonante();
        $comentario = 'Excluido por donación voluntaria Nro: ' . $donacion->getNumdedonacion();
        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
        $donante->excluir($tipodeexclusion, $comentario, $donacion->getFechextraccion());
        $em->persist($donante);
        $em->flush();

        return $this->redirect($this->generateUrl('ver_donacion', array('id' => $donacion->getId())));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function receptorAction() {
        return $this->render('HSYSMainBundle:Donacion:receptor.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function receptorDonanteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donacion:receptorDonante.html.twig', array('donantes' => $donantes,));
        } else {
            return $this->redirect($this->generateUrl('pagina_donacion'));
        }
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function receptorReceptorAction($don) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($don);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $receptores = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donacion:receptorReceptorReceptor.html.twig', array('donante' => $donante, 'receptores' => $receptores,));
        }
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($don);
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $don
            );
        }

        return $this->render('HSYSMainBundle:Donacion:receptorReceptor.html.twig', array('donante' => $donante,));
    }

//    /**
//     * 	@Secure(roles="ROLE_PERSONAL")
//     */
//    public function receptorFormularioAction($don, $rec) {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($don);
//        $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($rec);
//        //hacer mas lindo el error
//        if (!$receptor) {
//            throw $this->createNotFoundException(
//                    'No se encontro el receptor: ' . $rec
//            );
//        }
//        $hospitales = \HSYS\MainBundle\Entity\Hospital::$hospitales;
//        $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
//        return $this->render('HSYSMainBundle:Donacion:receptorFormulario.html.twig', array('donante' => $donante, 'receptor' => $receptor, 'hospitales' => $hospitales, 'responsables' => $responsables));
//    }
//
//    /**
//     * 	@Secure(roles="ROLE_PERSONAL")
//     */
//    public function receptorConfirmarAction() {
//        $request = $this->getRequest();
//        $numdedonacion = $request->request->get('numdedonacion');
//        $idDonante = $request->request->get('donante');
//        $idReceptor = $request->request->get('receptor');
//        $fecha = $request->request->get('fecha');
//        $hospital = $request->request->get('hospital');
//        $peso = $request->request->get('peso');
//        $tensionarterial = $request->request->get('tensionarterial');
//        $pulso = $request->request->get('pulso');
//        $temperatura = $request->request->get('temperatura');
//        $hto = $request->request->get('hto');
//        $obs = $request->request->get('obs');
//        $idbolsa = $request->request->get('bolsa');
//        $nrolote = $request->request->get('nrolote');
//        $vencimiento = $request->request->get('vencimiento');
//        $tipobolsa = $request->request->get('tipobolsa');
//        $marca = $request->request->get('marca');
//        $anticoagulante = $request->request->get('anticoagulante');
//        $tipodonacion = $request->request->get('tipodonacion');
//        $inspeccionbrazos = $request->request->get('inspeccionbrazos');
//        $respCuestionario = $request->request->get('respCuestionario');
//        $respFisico = $request->request->get('respFisico');
//
//
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $donacion = new Donacion();
//        $donante = new \HSYS\MainBundle\Entity\Donante();
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
//        $receptor = new \HSYS\MainBundle\Entity\Donante();
//        $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($idReceptor);
//        $donacion->setnumdedonacion($numdedonacion);
//        $donacion->setDonante($donante);
//        $donacion->setReceptor($receptor);
//        $donacion->setIdbolsa($idbolsa);
//        $fechaformat = new \DateTime;
//        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
//        $fechaformat->setTime(0, 0, 0);
//        $donacion->setFechextraccion($fechaformat);
//        $donacion->setHospital($hospital);
//        $donacion->setPeso($peso);
//        $donacion->setTensionarterial($tensionarterial);
//        $donacion->setPulso($pulso);
//        $donacion->setTemperatura($temperatura);
//        $donacion->setHto($hto);
//        $donacion->setInspeccionbrazos($inspeccionbrazos);
//        $donacion->setObs($obs);
//        $donacion->setTipodonacion($tipodonacion);
//
//        $fechaformatVenc = new \DateTime;
//        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
//        $fechaformatVenc->setTime(0, 0, 0);
//        $fechaVenc = $fechaformatVenc;
//
//        $donacion->setVencimientobolsa($fechaformatVenc);
//        $donacion->setNrolote($nrolote);
//        $donacion->setTipobolsa($tipobolsa);
//        $donacion->setMarca($marca);
//        $donacion->setAnticoagulante($anticoagulante);
//        $donacion->setRespCuestionario($respCuestionario);
//        $donacion->setRespFisico($respFisico);
//        $usr = $this->get('security.context')->getToken()->getUser();
//        $donacion->setRespDonacion($usr->getUsername());
//        $donacion->setTerminado(false);
//
//        $em->persist($donacion);
//        $em->flush();
//
//        $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
//
//        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion, 'responsables' => $responsables));
//    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        $RespCuestionario = $em->getRepository('HSYSMainBundle:Usuario')->find($donacion->getRespCuestionario())->getUsername();
        $RespFisico = $em->getRepository('HSYSMainBundle:Usuario')->find($donacion->getRespFisico())->getUsername();
        $RespDonacion = $em->getRepository('HSYSMainBundle:Usuario')->find($donacion->getRespDonacion())->getUsername();
        if ($donacion->getRespExtraccion() != null) {
            $RespExtraccion = $em->getRepository('HSYSMainBundle:Usuario')->find($donacion->getRespExtraccion())->getUsername();
        } else {
            $RespExtraccion = null;
        }
        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion, 'respCuestionario' => $RespCuestionario, 'respFisico' => $RespFisico, 'respExtraccion' => $RespExtraccion, 'respDonacion' => $RespDonacion));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function verDonanteAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        if ($donante) {
            $donaciones = $donante->getDonaciones();
            $receptores = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionesDelReceptor($donante->getid());
        } else {
            $donaciones = null;
            $receptores = null;
        }
        return $this->render('HSYSMainBundle:Donacion:verDonante.html.twig', array('donante' => $donante, 'donaciones' => $donaciones, 'receptores' => $receptores));
    }

    /**
     * 	@Secure(roles="ROLE_MEDICO")
     */
    public function anularAction($id) {
        $donacion = new Donacion();
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $causa = $request->request->get('causa');
            $comentario = $request->request->get('comentario');

            $donacion->setComentario($comentario);

            $donacion->anularDonacion($causa);

            $em->persist($donacion);
            $em->flush();

            return $this->redirect($this->generateUrl('ver_donacion', array('id' => $id)));
        }
        return $this->render('HSYSMainBundle:Donacion:anularDonacion.html.twig', array('donacion' => $donacion));
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function autodonacionAction() {
        return $this->render('HSYSMainBundle:Donacion:autodonacion.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_PERSONAL")
     */
    public function autodonacionDonanteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donacion:autodonacionDonante.html.twig', array('donantes' => $donantes,));
        } else {
            return $this->redirect($this->generateUrl('pagina_donacion'));
        }
    }
    
    /**
     *   @Secure(roles="ROLE_PERSONAL")
     */
    public function formAction($don, $rec = null) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();

        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($don);
        if ($rec != null) {
            $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($rec);
            //hacer mas lindo el error
            if (!$receptor) {
                throw $this->createNotFoundException(
                        'No se encontro el receptor: ' . $rec
                );
            }
        } else {
            $receptor = null;
        }

        $donacion = new Donacion();
        $form = $this->createForm(new DonacionType(), $donacion);
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $donacion->setDonante($donante);
                if ($rec != null) {
                    $donacion->setReceptor($receptor);
                }
                $donacion->setRespCuestionario($donacion->getRespCuestionario()->getID());
                $donacion->setRespFisico($donacion->getRespFisico()->getID());

                $usr = $this->get('security.context')->getToken()->getUser();
                $donacion->setRespDonacion($usr->getID());

                $donacion->setTerminado(false);

                $em->persist($donacion);
                $em->flush();

                $responsables = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
                return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion, 'responsables' => $responsables));
            }
        }
        return $this->render('HSYSMainBundle:Donacion:nuevoForm.html.twig', array('donante' => $donante, 'receptor' => $receptor, 'form' => $form->createView()));
    }
    
    /**
     * @Secure(roles="ROLE_PERSONAL")
     */
    public function asignarReceptorAction($id){
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        $donantes = null;
        if ($donacion->getReceptor()->getId() != 1){
            return $this->render('HSYSMainBundle:Donacion:error.html.twig', array('razon' => 'ACCESO DENEGADO: No se puede asignar receptor'));
        }
        if ($request->getMethod() == 'POST'){
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
        }
        return $this->render('HSYSMainBundle:Donacion:buscarReceptor.html.twig', array('id' => $id , 'donantes' => $donantes));
    }
    
    public function asignarReceptorFinalAction($don,$rec){
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($don);
        $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($rec);
        $donacion->setReceptor($receptor);
        $em->persist($donacion);
        $em->flush();
        return $this->render('HSYSMainBundle:Donacion:confirmacion.html.twig', array('id' => $don , 'accion' => 'asignado el receptor'));
    }

}

?>
