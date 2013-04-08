<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonacionType;
use HSYS\MainBundle\Entity\Donacion;
use HSYS\MainBundle\Entity\Unidad;

//use Symfony\Component\HttpFoundation\Request;

class DonacionController extends Controller {

    public function indexAction() {
        return $this->render('HSYSMainBundle:Donacion:index.html.twig');
    }

    public function nuevoAction() {
//        $request = $this->getRequest();
//
//        $donacion = new Donacion();
//        $form = $this->createForm(new DonacionType(), $donacion);
//
//        if ($request->getMethod() == 'POST') {
//            $form->bindRequest($request);
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($donacion);
//                $em->flush();
//                return $this->redirect($this->generateURL('confirmacion_donacion'));
//                //aca poner respuesta no se como
//            }
//        }
        return $this->render('HSYSMainBundle:Donacion:nuevo.html.twig');
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

    public function buscarDonanteAction() {
        $request = $this->getRequest();
        $donaciones = null;
        $donante = null;
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $donanteID = $request->request->get('donante');
            $donante = $em->getRepository('HSYSMainBundle:Donante')->find($donanteID);
            if ($donante) {
                $donaciones = $donante->getDonaciones();
            } else {
                $donaciones = null;
            }
        }
        return $this->render('HSYSMainBundle:Donacion:buscarDonante.html.twig', array('donaciones' => $donaciones, 'donante' => $donante));
    }

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

    public function voluntariaAction() {
        return $this->render('HSYSMainBundle:Donacion:voluntaria.html.twig');
    }

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

    public function voluntariaFormularioAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $id
            );
        }
        return $this->render('HSYSMainBundle:Donacion:voluntariaFormulario.html.twig', array('donante' => $donante));
    }
//el encargado de crear una unidad tiene que ser la donacion, el metodo ya esta pero falta implementarlo en este controlador
    public function voluntariaConfirmarAction() {
        $request = $this->getRequest();
        $idDonante = $request->request->get('donante');
        $fecha = $request->request->get('fecha');
        $localidad = $request->request->get('localidad');
        $hospital = $request->request->get('hospital');
        $peso = $request->request->get('peso');
        $tensionarterial = $request->request->get('tensionarterial');
        $pulso = $request->request->get('pulso');
        $temperatura = $request->request->get('temperatura');
        $hto = $request->request->get('hto');
        $inspeccionbrazos = $request->request->get('inspeccionbrazos');
        $obs = $request->request->get('obs');
        $idbolsa = $request->request->get('bolsa');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');
        $flebotomia = $request->request->get('flebotomia');
        $puncion = $request->request->get('puncion');
        $reaccionpostextraccion = $request->request->get('reaccionpostextraccion');
        $nrolote = $request->request->get('nrolote');
        $vencimiento = $request->request->get('vencimiento');
        $tipobolsa = $request->request->get('tipobolsa');
        $marca = $request->request->get('marca');
        $anticoagulante = $request->request->get('anticoagulante');
        $tipodonacion = $request->request->get('tipodonacion');

        $em = $this->getDoctrine()->getEntityManager();
        
        $donacion = new Donacion();
        $donante = new \HSYS\MainBundle\Entity\Donante();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
        $donacion->setDonante($donante);
        $donacion->setIdbolsa($idbolsa);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setLocalidad($localidad);
        $donacion->setHospital($hospital);
        $donacion->setPeso($peso);
        $donacion->setTensionarterial($tensionarterial);
        $donacion->setPulso($pulso);
        $donacion->setTemperatura($temperatura);
        $donacion->setHto($hto);
        $donacion->setInspeccionbrazos($inspeccionbrazos);
        $donacion->setObs($obs);
        $donacion->setFlebotomia($flebotomia);
        $donacion->setPuncion($puncion);
        $donacion->setReaccionpostextraccion($reaccionpostextraccion);
        $donacion->setComentario($comentarios);
        $donacion->setTipodonacion($tipodonacion);
        
        $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
        
        $fechaformatVenc = new \DateTime;
        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
        $fechaVenc = $fechaformatVenc->format('Y-m-d');
//        $donacion->crearUnidad($tipohemo, $volumen, $fechaVenc);
        $donacion->crearUnidad($tipohemo, $volumen, $tipobolsa, $nrolote, $marca, $anticoagulante, $fechaVenc);
        
        $em->persist($donacion);
        $em->flush();
        
        
        //esto es lo que habia antes.
//        $bolsa = new Unidad();
//        $bolsa->setEstado('Bloqueado');
//        $bolsa->setIdbolsa($idbolsa);
//        //$bolsa->setVencimiento($fecha);
//        $bolsa->setVolumen($volumen);
//
//        //buscar sangre entera y hacer
//        $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
//        $bolsa->setTipoHemocomponente($tipohemo);
//        $sumarU = '+' . $tipohemo->getDuracion() . ' day';
//        $vencimiento = strtotime($sumarU, strtotime($fecha));
//        $vencimiento = date('Y-m-j', $vencimiento);
//        $fechaformatvenc = new \DateTime;
//        $fechaformatvenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
//        $bolsa->setVencimiento($fechaformatvenc);
//        
//
//
//        $donacion = new Donacion();
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
//        $donacion->setDonante($donante);
//        $donacion->setIdbolsa($idbolsa);
//        $fechaformat = new \DateTime;
//        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
//        $donacion->setFechextraccion($fechaformat);
//        $donacion->setComentario($comentarios);
//
//        $em->persist($donacion);
//        $em->flush();
        
        //guardo el id de donacion y flusheo la unidad
//        $bolsa->setDonacion($donacion);
//        $em->persist($bolsa);
//        $em->flush();

        $comentario = 'Excluido por donación voluntaria ID: ' . $donacion->getId();
        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
        $donante->excluir($tipodeexclusion, $comentario, $fechaformat);
        $em->persist($donante);
        $em->flush();
        

        //viejo...igual no borrar xD
        //Exclusion por donar
//        $exclusion = new \HSYS\MainBundle\Entity\Exclusion;
//        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
//        $exclusion->setTipoExclusion($tipodeexclusion);
//        $exclusion->setDonante($donante);
//        $exclusion->setFechini($fechaformat);
//        $sumar = '+' . $tipodeexclusion->getDuracion() . ' day';
//        $nuevafecha = strtotime($sumar, strtotime($fecha));
//        $nuevafecha = date('Y-m-j', $nuevafecha);
//        $fechaformat1 = new \DateTime;
//        $fechaformat1->setDate(substr($nuevafecha, 0, 4), substr($nuevafecha, 5, 2), substr($nuevafecha, 8, 2));
//        $exclusion->setFechfin($fechaformat1);
//
//        $comentario = 'Excluido por donación voluntaria ID: ' . $donacion->getId();
//        $exclusion->setComentario($comentario);

//        $em->persist($exclusion);
//        $em->flush();

        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }

    public function receptorAction() {
        return $this->render('HSYSMainBundle:Donacion:receptor.html.twig');
    }

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

    public function receptorFormularioAction($don, $rec) {
        $em = $this->getDoctrine()->getEntityManager();

        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($don);
        $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($rec);
        //hacer mas lindo el error
        if (!$receptor) {
            throw $this->createNotFoundException(
                    'No se encontro el receptor: ' . $rec
            );
        }
        return $this->render('HSYSMainBundle:Donacion:receptorFormulario.html.twig', array('donante' => $donante, 'receptor' => $receptor));
    }

    public function receptorConfirmarAction() {
        $request = $this->getRequest();
        $idDonante = $request->request->get('donante');
        $idReceptor = $request->request->get('receptor');
        $fecha = $request->request->get('fecha');
        $localidad = $request->request->get('localidad');
        $hospital = $request->request->get('hospital');
        $idbolsa = $request->request->get('bolsa');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');
        $flebotomia = $request->request->get('flebotomia');
        $puncion = $request->request->get('puncion');
        $reaccionpostextraccion = $request->request->get('reaccionpostextraccion');
        $nrolote = $request->request->get('nrolote');
        $vencimiento = $request->request->get('vencimiento');
        $tipobolsa = $request->request->get('tipobolsa');
        $marca = $request->request->get('marca');
        $anticoagulante = $request->request->get('anticoagulante');
        $tipodonacion = $request->request->get('tipodonacion');

        $em = $this->getDoctrine()->getEntityManager();

        $donacion = new Donacion();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
        $donacion->setDonante($donante);
        $donacion->setReceptor($em->getRepository('HSYSMainBundle:Donante')->find($idReceptor));
        $donacion->setIdbolsa($idbolsa);
        $donacion->setLocalidad($localidad);
        $donacion->setHospital($hospital);
        $donacion->setFlebotomia($flebotomia);
        $donacion->setPuncion($puncion);
        $donacion->setReaccionpostextraccion($reaccionpostextraccion);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setComentario($comentarios);
        $donacion->setTipodonacion($tipodonacion);
        
        $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
        
        $fechaformatVenc = new \DateTime;
        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
        $fechaVenc = $fechaformatVenc->format('Y-m-d');
//        $donacion->crearUnidad($tipohemo, $volumen, $fechaVenc);
        $donacion->crearUnidad($tipohemo, $volumen, $tipobolsa, $nrolote, $marca, $anticoagulante, $fechaVenc);
        
        $em->persist($donacion);
        $em->flush();
        
        
        //codigo viejo.
//        $bolsa = new Unidad();
//        $bolsa->setEstado('Bloqueado');
//        $bolsa->setIdbolsa($idbolsa);
//        //$bolsa->setVencimiento($fecha);
//        $bolsa->setVolumen($volumen);
//        //buscar sangre entera y hacer
//        $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));
//        $bolsa->setTipoHemocomponente($tipohemo);
//        $sumarU = '+' . $tipohemo->getDuracion() . ' day';
//        $vencimiento = strtotime($sumarU, strtotime($fecha));
//        $vencimiento = date('Y-m-j', $vencimiento);
//        $fechaformatvenc = new \DateTime;
//        $fechaformatvenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
//        $bolsa->setVencimiento($fechaformatvenc);
//       
//
//
//        $donacion = new Donacion();
//        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
//        $donacion->setDonante($donante);
//        $donacion->setReceptor($em->getRepository('HSYSMainBundle:Donante')->find($idReceptor));
//        $donacion->setIdbolsa($idbolsa);
//        $fechaformat = new \DateTime;
//        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
//        $donacion->setFechextraccion($fechaformat);
//        $donacion->setComentario($comentarios);
//
//        $em->persist($donacion);
//        $em->flush();
//        
//        
//        //guardo el id de donacion y flusheo la unidad
//        $bolsa->setDonacion($donacion);
//        $em->persist($bolsa);
//        $em->flush();
        
        $comentario = 'Excluido por donación con Receptor ID: ' . $donacion->getId();
        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
        $donante->excluir($tipodeexclusion, $comentario, $fechaformat);
        $em->persist($donante);
        $em->flush();
        
//        //Exclusion por donar
//        $exclusion = new \HSYS\MainBundle\Entity\Exclusion;
//        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
//        $exclusion->setTipoExclusion($tipodeexclusion);
//        $exclusion->setDonante($donante);
//        $exclusion->setFechini($fechaformat);
//        $sumar = '+' . $tipodeexclusion->getDuracion() . ' day';
//        $nuevafecha = strtotime($sumar, strtotime($fecha));
//        $nuevafecha = date('Y-m-j', $nuevafecha);
//        $fechaformat1 = new \DateTime;
//        $fechaformat1->setDate(substr($nuevafecha, 0, 4), substr($nuevafecha, 5, 2), substr($nuevafecha, 8, 2));
//        $exclusion->setFechfin($fechaformat1);
//
//        $comentario = 'Excluido por donación con Receptor ID: ' . $donacion->getId();
//        $exclusion->setComentario($comentario);
//
//        $em->persist($exclusion);
//        $em->flush();

        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }

    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }

}

?>
