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
        /*$request = $this->getRequest();
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
    } */
        //$donante = null;
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
                    'No se encontro el donante: ' . $id
            );
        }
        $hospitales = \HSYS\MainBundle\Entity\Hospital::$hospitales;
        return $this->render('HSYSMainBundle:Donacion:voluntariaFormulario.html.twig', array('donante' => $donante, 'hospitales' => $hospitales));
    }
    
//    public function voluntariaFormularioTerminadoAction($numdedonacion){
//        $em = $this->getDoctrine()->getEntityManager();
//        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->findOneBy(array('numdedonacion'=>$numdedonacion));
//        
//        if (!$donacion) {
//            throw $this->createNotFoundException(
//                    'No se encontro la donacion: ' . $numdedonacion
//            );
//        };
//        
//        $donante = $donacion->getDonante();
//        $hospitales = \HSYS\MainBundle\Entity\Hospital::$hospitales;
//        return $this->render('HSYSMainBundle:Donacion:voluntariaFormulario.html.twig', array('donante' => $donante, 'hospitales' => $hospitales, 'donacion' =>$donacion));
//    }
    
    
    public function voluntariaFormularioGuardarAction(){
        $request = $this->getRequest();
        $numdedonacion = $request->request->get('numdedonacion');
        $idDonante = $request->request->get('donante');
        $fecha = $request->request->get('fecha');
        $hospital = $request->request->get('hospital');
        $peso = $request->request->get('peso');
        $tensionarterial = $request->request->get('tensionarterial');
        $pulso = $request->request->get('pulso');
        $temperatura = $request->request->get('temperatura');
        $hto = $request->request->get('hto');
        $obs = $request->request->get('obs');
        $idbolsa = $request->request->get('bolsa');
        $nrolote = $request->request->get('nrolote');
        $vencimiento = $request->request->get('vencimiento');
        $tipobolsa = $request->request->get('tipobolsa');
        $marca = $request->request->get('marca');
        $anticoagulante = $request->request->get('anticoagulante');
        $tipodonacion = $request->request->get('tipodonacion');
        $inspeccionbrazos = $request->request->get('inspeccionbrazos');
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $donacion = new Donacion();
        $donante = new \HSYS\MainBundle\Entity\Donante();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
        $donacion->setnumdedonacion($numdedonacion);
        $donacion->setDonante($donante);
        $donacion->setIdbolsa($idbolsa);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setHospital($hospital);
        $donacion->setPeso($peso);
        $donacion->setTensionarterial($tensionarterial);
        $donacion->setPulso($pulso);
        $donacion->setTemperatura($temperatura);
        $donacion->setHto($hto);
        $donacion->setInspeccionbrazos($inspeccionbrazos);
        $donacion->setObs($obs);
        $donacion->setTipodonacion($tipodonacion);
        $donacion->setAnulado(0);
        
        $fechaformatVenc = new \DateTime;
        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
        $fechaVenc = $fechaformatVenc;
        
        $donacion->setVencimientobolsa($fechaformatVenc);
        $donacion->setNrolote($nrolote);
        $donacion->setTipobolsa($tipobolsa);
        $donacion->setMarca($marca);
        $donacion->setAnticoagulante($anticoagulante);
        $donacion->setTerminado(false);
        
        $em->persist($donacion);
        $em->flush();
        
        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion));
        
    }
    
    //para leer el valor
    public function voluntariaFormularioContinuarAction($numdedonacion){
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->findOneBy(array('numdedonacion'=>$numdedonacion));
        
        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion));
    }


//el encargado de crear una unidad tiene que ser la donacion, el metodo ya esta pero falta implementarlo en este controlador
    public function voluntariaConfirmarAction() {
        $request = $this->getRequest();
        $numdedonacion = $request->request->get('numdedonacion');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');
        $flebotomia = $request->request->get('flebotomia');
        $puncion = $request->request->get('puncion');
        $reaccionpostextraccion = $request->request->get('reaccionpostextraccion');

        $em = $this->getDoctrine()->getEntityManager();
        
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->findOneBy(array('numdedonacion' => $numdedonacion));
    
        $donacion->setFlebotomia($flebotomia);
        $donacion->setPuncion($puncion);
        $donacion->setReaccionpostextraccion($reaccionpostextraccion);
        $donacion->setComentario($comentarios);
        
        $tipohemo = $em->getRepository('HSYSMainBundle:TipoHemocomponente')->findOneBy(array('nombre' => 'Sangre Entera'));

        $donacion->crearUnidad($tipohemo, $volumen, $donacion->getTipobolsa(), $donacion->getNrolote(), $donacion->getMarca(), $donacion->getAnticoagulante(), $donacion->getVencimientobolsa());
        
        $donacion->setTerminado(true);
        
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
        
        $donante = $donacion->getDonante();
        $comentario = 'Excluido por donación voluntaria Nro: ' . $donacion->getNumdedonacion();
        $tipodeexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findOneBy(array('nombre' => 'Exclusion por donacion'));
        $donante->excluir($tipodeexclusion, $comentario, $donacion->getFechextraccion());
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
        
        return $this->redirect($this->generateUrl('ver_donacion', array('id' => $donacion->getId())));

//        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
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
        $hospitales = \HSYS\MainBundle\Entity\Hospital::$hospitales;
        return $this->render('HSYSMainBundle:Donacion:receptorFormulario.html.twig', array('donante' => $donante, 'receptor' => $receptor, 'hospitales' => $hospitales));
    }

    public function receptorConfirmarAction() {
       $request = $this->getRequest();
        $numdedonacion = $request->request->get('numdedonacion');
        $idDonante = $request->request->get('donante');
        $idReceptor = $request->request->get('receptor');
        $fecha = $request->request->get('fecha');
        $hospital = $request->request->get('hospital');
        $peso = $request->request->get('peso');
        $tensionarterial = $request->request->get('tensionarterial');
        $pulso = $request->request->get('pulso');
        $temperatura = $request->request->get('temperatura');
        $hto = $request->request->get('hto');
        $obs = $request->request->get('obs');
        $idbolsa = $request->request->get('bolsa');
        $nrolote = $request->request->get('nrolote');
        $vencimiento = $request->request->get('vencimiento');
        $tipobolsa = $request->request->get('tipobolsa');
        $marca = $request->request->get('marca');
        $anticoagulante = $request->request->get('anticoagulante');
        $tipodonacion = $request->request->get('tipodonacion');
        $inspeccionbrazos = $request->request->get('inspeccionbrazos');
        
        $em = $this->getDoctrine()->getEntityManager();
        
        $donacion = new Donacion();
        $donante = new \HSYS\MainBundle\Entity\Donante();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($idDonante);
        $receptor = new \HSYS\MainBundle\Entity\Donante();
        $receptor = $em->getRepository('HSYSMainBundle:Donante')->find($idReceptor);
        $donacion->setnumdedonacion($numdedonacion);
        $donacion->setDonante($donante);
        $donacion->setReceptor($receptor);
        $donacion->setIdbolsa($idbolsa);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setHospital($hospital);
        $donacion->setPeso($peso);
        $donacion->setTensionarterial($tensionarterial);
        $donacion->setPulso($pulso);
        $donacion->setTemperatura($temperatura);
        $donacion->setHto($hto);
        $donacion->setInspeccionbrazos($inspeccionbrazos);
        $donacion->setObs($obs);
        $donacion->setTipodonacion($tipodonacion);
        $donacion->setAnulado(0);
        
        $fechaformatVenc = new \DateTime;
        $fechaformatVenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
        $fechaVenc = $fechaformatVenc;
        
        $donacion->setVencimientobolsa($fechaformatVenc);
        $donacion->setNrolote($nrolote);
        $donacion->setTipobolsa($tipobolsa);
        $donacion->setMarca($marca);
        $donacion->setAnticoagulante($anticoagulante);
        $donacion->setTerminado(false);
        
        $em->persist($donacion);
        $em->flush();
        
        return $this->render('HSYSMainBundle:Donacion:formularioContinuar.html.twig', array('donacion' => $donacion));
     
    }

    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }
    
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
        return $this->render('HSYSMainBundle:Donacion:verDonante.html.twig', array('donante' => $donante, 'donaciones' => $donaciones, 'receptores' =>$receptores));
    }

}

?>
