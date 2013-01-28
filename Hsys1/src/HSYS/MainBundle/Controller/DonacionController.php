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
        $request = $this->getRequest();

        $donacion = new Donacion();
        $form = $this->createForm(new DonacionType(), $donacion);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donacion);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_donacion'));
                //aca poner respuesta no se como
            }
        }
        return $this->render('HSYSMainBundle:Donacion:nuevo.html.twig', array('form' => $form->createView(),));
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
            $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorId($numero);
            return $this->render('HSYSMainBundle:Donacion:buscarNumero.html.twig', array('donaciones' => $donaciones,));
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
            if ($desde && $hasta) {
                $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorRangoDeFecha($desde, $hasta);
            } else {
                $donaciones = null;
            }
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

    public function voluntariaConfirmarAction() {
        $request = $this->getRequest();
        $idDonante = $request->request->get('donante');
        $fecha = $request->request->get('fecha');
        $idbolsa = $request->request->get('bolsa');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');

        $em = $this->getDoctrine()->getEntityManager();

        $bolsa = new Unidad();
        $bolsa->setEstado('bloqueado');
        $bolsa->setIdbolsa($idbolsa);
        //$bolsa->setVencimiento($fecha);
        $bolsa->setVolumen($volumen);
        //buscar sangre entera y hacer
        //$bolsa->setTipoHemocomponente($TipoHemocomponente);
        $em->persist($bolsa);
        $em->flush();


        $donacion = new Donacion();
        $donacion->setDonante($em->getRepository('HSYSMainBundle:Donante')->find($idDonante));
        $donacion->setIdbolsa($idbolsa);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setComentario($comentarios);

        $em->persist($donacion);
        $em->flush();

        return $this->render('HSYSMainBundle:Donacion:index.html.twig');
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
        $idbolsa = $request->request->get('bolsa');
        $volumen = $request->request->get('volumen');
        $comentarios = $request->request->get('comentarios');

        $em = $this->getDoctrine()->getEntityManager();

        $bolsa = new Unidad();
        $bolsa->setEstado('bloqueado');
        $bolsa->setIdbolsa($idbolsa);
        //$bolsa->setVencimiento($fecha);
        $bolsa->setVolumen($volumen);
        //buscar sangre entera y hacer
        //$bolsa->setTipoHemocomponente($TipoHemocomponente);
        $em->persist($bolsa);
        $em->flush();


        $donacion = new Donacion();
        $donacion->setDonante($em->getRepository('HSYSMainBundle:Donante')->find($idDonante));
        $donacion->setReceptor($em->getRepository('HSYSMainBundle:Donante')->find($idReceptor));
        $donacion->setIdbolsa($idbolsa);
        $fechaformat = new \DateTime;
        $fechaformat->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
        $donacion->setFechextraccion($fechaformat);
        $donacion->setComentario($comentarios);

        $em->persist($donacion);
        $em->flush();

        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }

    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        return $this->render('HSYSMainBundle:Donacion:ver.html.twig', array('donacion' => $donacion));
    }

}

?>
