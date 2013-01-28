<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonanteType;
use HSYS\MainBundle\Entity\Donante;
use HSYS\MainBundle\Entity\Exclusion;
use Symfony\Component\HttpFoundation\Request;

class DonanteController extends Controller {

    public function indexAction() {
        return $this->render('HSYSMainBundle:Donante:index.html.twig');
    }

    public function nuevoAction() {
        $request = $this->getRequest();

        $donante = new Donante();
        $form = $this->createForm(new DonanteType(), $donante);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donante);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion', array('accion' => 'agregado', 'id' => $donante->getId())));
//aca poner respuesta no se como
            }
        }
        return $this->render('HSYSMainBundle:Donante:nuevo.html.twig', array('form' => $form->createView(),));
    }

    public function modificarAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $donante = $em->getRepository('HSYSMainBundle:donante')->find($id);
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $id
            );
        }

        $form = $this->createForm(new DonanteType(), $donante);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em->persist($donante);
                $em->flush();
                return $this->redirect($this->generateURL('ver_donante', array('id' => $donante->getId())));
            } else {
                return 'no es valido';
            }
        }

        return $this->render('HSYSMainBundle:Donante:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,));
    }

    public function confirmacionAction($accion, $id) {
        return $this->render('HSYSMainBundle:Donante:confirmacion.html.twig', array('accion' => $accion, 'id' => $id,));
    }

    public function excluirAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $idtipodeexclusion = $request->request->get('tipodeexclusion');
            $comentarios = $request->request->get('comentarios');
            $tipoexclusion = new \HSYS\MainBundle\Entity\TipoExclusion;
            $tipoexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->find($idtipodeexclusion);
            $exclusion = new Exclusion;
            $exclusion->setTipoExclusion($tipoexclusion);
            $donanteexcluido = $em->getRepository('HSYSMainBundle:Donante')->find($id);
            $exclusion->setDonante($donanteexcluido);
            //$fechactual = date('Y-m-j');
            $fechactual = $request->request->get('fechaingreso');
            $fechaformat = new \DateTime;
            $fechaformat->setDate(substr($fechactual, 0, 4), substr($fechactual, 5, 2), substr($fechactual, 8, 2));
            $exclusion->setFechini($fechaformat);
            if ($tipoexclusion->getDuracion() != 0) {
                $sumar = '+' . $tipoexclusion->getDuracion() . ' day';
                $nuevafecha = strtotime($sumar, strtotime($fechactual));
                $nuevafecha = date('Y-m-j', $nuevafecha);
                $fechaformat1 = new \DateTime;
                $fechaformat1->setDate(substr($nuevafecha, 0, 4), substr($nuevafecha, 5, 2), substr($nuevafecha, 8, 2));
                $exclusion->setFechfin($fechaformat1);
            };



            $exclusion->setComentario($comentarios);
            $em->persist($exclusion);
            $em->flush();

            return $this->redirect($this->generateURL('confirmacion', array('accion' => "excluido", 'id' => $id)));
        }

        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $tiposExlusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findAll();
        return $this->render('HSYSMainBundle:Donante:excluir.html.twig', array('tiposExclusion' => $tiposExlusion, 'donante' => $donante, 'id' => $id));
        #aca le tengo que pasar el donante y los tipos de exclusion que existe para excluir al forro ese por drogon
    }

    public function buscarAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $donantes = $em->getRepository('HSYSMainBundle:Donante')->findDonante($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Donante:buscar.html.twig', array('donantes' => $donantes,));
        } else {
            return $this->redirect($this->generateUrl('pagina_donante'));
        }
    }

    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $id
            );
        }
        return $this->render('HSYSMainBundle:Donante:ver.html.twig', array('donante' => $donante,));
    }

    public function habilitarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $habilitado = false;
        if ($donante->getExclusionesActivas()== null){
           $habilitado = true;
        }
        
        if ($request->getMethod() == 'POST') {
            $donante->habilitar();
            $em->persist($donante);
            $em->flush();
            return $this->redirect($this->generateURL('confirmacion', array('accion' => "ha sido habilitado", 'id' => $id)));
        }
        $exclusiones = new Exclusion;
        //ordenar por en el metodo getExclusionesActivas().
        $exclusiones = $em->getRepository('HSYSMainBundle:Exclusion')->findExclusionesdelDonante($id);
        return $this->render('HSYSMainBundle:Donante:habilitar.html.twig', array('id' => $id, 'donante' => $donante, 'exclusiones' => $exclusiones, 'habilitado' => $habilitado));
    }

}

?>
