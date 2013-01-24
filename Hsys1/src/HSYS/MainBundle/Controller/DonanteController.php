<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonanteType;
use HSYS\MainBundle\Entity\Donante;
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
                return $this->redirect($this->generateURL('confirmacion'));
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
                return $this->redirect($this->generateURL('confirmacion'));
            } else {
                return 'no es valido';
            }
        }

        return $this->render('HSYSMainBundle:Donante:modificar.html.twig', array('form' => $form->createView(), 'id' => $id,));
    }

    public function confirmacionAction() {
        return $this->render('HSYSMainBundle:Donante:confirmacion.html.twig');
    }

    public function excluirAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $tiposExlusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findAll();

        return $this->render('HSYSMainBundle:Donante:excluir.html.twig', array('tiposExclusion' => $tiposExlusion, 'id' => $id));
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

}

?>
