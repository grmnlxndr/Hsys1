<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Entity\analisis;
use HSYS\MainBundle\Form\analisisType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use JMS\SecurityExtraBundle\Annotation\Secure;

class AnalisisController extends Controller
{
    /**
    * 	@Secure(roles="ROLE_BIOQUIMICO")
    */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Analisis:index.html.twig');
    }
    
    public function nuevoAction() {
        return $this->render('HSYSMainBundle:Analisis:nuevo.html.twig');
    }
    
    public function nuevoDonacionAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $numero = $request->request->get('numDonacion');
            $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorId($numero);
            return $this->render('HSYSMainBundle:Analisis:nuevoDonacion.html.twig', array('donaciones' => $donaciones));
        }
        return $this->render('HSYSMainBundle:Analisis:nuevoDonacion.html.twig');
    }
    
    public function nuevoBolsaAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $numero = $request->request->get('numBolsa');
            $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorIdBolsa($numero);
            return $this->render('HSYSMainBundle:Analisis:nuevoBolsa.html.twig', array('donaciones' => $donaciones));
        }
        return $this->render('HSYSMainBundle:Analisis:nuevoBolsa.html.twig');
    }    
        
    public function nuevoDonanteAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $numero = $request->request->get('numDonante');
            $donante = $em->getRepository('HSYSMainBundle:Donante')->find($numero);
            $donaciones = null;
            if ($donante) {
                $donaciones = $donante->getDonaciones();
            }
            return $this->render('HSYSMainBundle:Analisis:nuevoDonante.html.twig', array('donaciones' => $donaciones));
        }
        return $this->render('HSYSMainBundle:Analisis:nuevoDonante.html.twig');
    }

    public function nuevoFechaAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $desde = $request->request->get('desde');
            $hasta = $request->request->get('hasta');
            $donaciones = null;
            if ($desde && $hasta) {
                $donaciones = $em->getRepository('HSYSMainBundle:Donacion')->findDonacionPorRangoDeFecha($desde, $hasta);
            }
            return $this->render('HSYSMainBundle:Analisis:nuevoFecha.html.twig', array('donaciones' => $donaciones));
        }
        return $this->render('HSYSMainBundle:Analisis:nuevoFecha.html.twig');
    }
    
    public function nuevoFormAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        
        $analisis = new analisis();
        $form = $this->createForm(new analisisType(), $analisis);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $fecha = $request->request->get('fecha');
                $fechanalisis = new \DateTime();
                $fechanalisis->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
                $analisis->setFechanalisis($fechanalisis);
                
                $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
                $donacion->setAnalisis($analisis);
                
                $em->persist($analisis);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_analisis', array('accion' => 'agregado', 'id' => $analisis->getId())));
            }    
        }

        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($id);
        return $this->render('HSYSMainBundle:Analisis:nuevoForm.html.twig', array('form' => $form->createView(), 'donacion' => $donacion));
    }
    
    public function confirmacionAction($accion, $id) {
        return $this->render('HSYSMainBundle:Analisis:confirmacion.html.twig', array('accion' => $accion, 'id' => $id,));
    }
    
    public function buscarAction() {
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();
            $busqueda = $request->request->get('buscar');
            $criterio = $request->request->get('criterio');
            $analisis = $em->getRepository('HSYSMainBundle:Analisis')->findAnalisis($busqueda, $criterio);
            return $this->render('HSYSMainBundle:Analisis:index.html.twig', array('analisis' => $analisis,));
        } else {
            return $this->redirect($this->generateUrl('pagina_analisis'));
        }
    }
    
    public function modificarAction($id) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $analisis = $em->getRepository('HSYSMainBundle:Analisis')->find($id);
        $fechanalisis = $analisis->getfechanalisis();
        //hacer mas lindo el error
        if (!$analisis) {
            throw $this->createNotFoundException(
                    'No se encontro el analisis: ' . $id
            );
        }

        $form = $this->createForm(new analisisType(), $analisis);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $fecha = $request->request->get('fecha');
                $fechanalisis = new \DateTime();
                $fechanalisis->setDate(substr($fecha, 0, 4), substr($fecha, 5, 2), substr($fecha, 8, 2));
                $analisis->setFechanalisis($fechanalisis);
                
                $em->persist($analisis);
                $em->flush();
                return $this->redirect($this->generateURL('confirmacion_analisis', array('accion' => 'modificado', 'id' => $analisis->getId())));
            } else {
                return 'no es valido';
            }
        }
        $donacion = $analisis->getDonacion();
        return $this->render('HSYSMainBundle:Analisis:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,'fechanalisis'=>$fechanalisis,'donacion'=>$donacion));
    }
    
    public function verAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $analisis = $em->getRepository('HSYSMainBundle:Analisis')->find($id);
        if (!$analisis){
            return $this->redirect('pagina_analisis');
        }
        
        $donacion = $analisis->getDonacion();
        
        return $this->render('HSYSMainBundle:Analisis:ver.html.twig', array('analisis' => $analisis, 'donacion' => $donacion));
        
    }
}
