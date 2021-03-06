<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Form\DonanteType;
use HSYS\MainBundle\Entity\Donante;
use HSYS\MainBundle\Entity\Exclusion;
use Symfony\Component\HttpFoundation\Request;

class DonanteController extends Controller {
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Donante:index.html.twig');
    }
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function nuevoAction() {
        $request = $this->getRequest();

        $donante = new Donante();
        $form = $this->createForm(new DonanteType(), $donante);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $donante->setBaja(false);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($donante);
                $em->flush();
                return $this->redirect($this->generateUrl('ver_donante', array('id' => $donante->getId())));
            }
        }
        // $provincias = \HSYS\MainBundle\Entity\Provincias::$provincias;
        $em = $this->getDoctrine()->getEntityManager();
        $paises = $em->getRepository('HSYSMainBundle:Pais')->findAll();
      
        return $this->render('HSYSMainBundle:Donante:nuevo.html.twig', array('form' => $form->createView(),'paises' => $paises));
    }
    
    /**
    * 	@Secure(roles="ROLE_MEDICO")
    */
    public function modificarAction($id) {
        if ($id == 1){
            return $this->render('HSYSMainBundle:Donante:error.html.twig', array('razon' => 'ACCESO DENEGADO: No se puede modificar este donante'));
        };
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
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
        $paises = $em->getRepository('HSYSMainBundle:Pais')->findAll();
        
        $paisnac = $em->getRepository('HSYSMainBundle:Pais')->findOneByNombre($donante->getPaisnac());
        $provinciasnac = $em->getRepository('HSYSMainBundle:Provincia')->findBy(array('Pais' => $paisnac->getId()));
        
        $paisActual = $em->getRepository('HSYSMainBundle:Pais')->findOneByNombre($donante->getPais());
        $provinciasActual = $em->getRepository('HSYSMainBundle:Provincia')->findBy(array('Pais' => $paisActual->getId()));
        $provinciaActual =  $em->getRepository('HSYSMainBundle:Provincia')->findOneBy(array('Pais' => $paisActual->getId(), 'nombre'=>$donante->getProvincia()));
        $ciudadesActual = $em->getRepository('HSYSMainBundle:Localidad')->findBy(array('Provincia' => $provinciaActual->getId()));
        
        return $this->render('HSYSMainBundle:Donante:modificar.html.twig', array('form' => $form->createView(),'donante'=>$donante, 'id' => $id,'paises'=>$paises, 'provinciasnac'=>$provinciasnac, 'provinciasActual' => $provinciasActual, 'ciudadesActual'=>$ciudadesActual));
    }
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function confirmacionAction($accion, $id) {
        return $this->render('HSYSMainBundle:Donante:confirmacion.html.twig', array('accion' => $accion, 'id' => $id,));
    }
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function excluirAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $idtipodeexclusion = $request->request->get('tipodeexclusion');
            $comentarios = $request->request->get('comentarios');
            $fechactual = $request->request->get('fechaingreso');
            $fechaformat = new \DateTime;
            $fechaformat->setDate(substr($fechactual, 0, 4), substr($fechactual, 5, 2), substr($fechactual, 8, 2));
            $tipoexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->find($idtipodeexclusion);
            $donanteexcluido = $em->getRepository('HSYSMainBundle:Donante')->find($id);
            
            $duracion = null;
            if ($tipoexclusion->getDuracion() == null){
                $duracion = $request->request->get('tiempo');
            }
            $donanteexcluido->excluir($tipoexclusion, $comentarios, $fechaformat, $duracion);
            $em->persist($donanteexcluido);
            $em->flush();
            
            return $this->redirect($this->generateURL('confirmacion', array('accion' => "excluido", 'id' => $id)));
        }

        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $tiposExlusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findAll();
        return $this->render('HSYSMainBundle:Donante:excluir.html.twig', array('tiposExclusion' => $tiposExlusion, 'donante' => $donante));
    }
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function excluirdonacionAction($donanteid, $donacionid) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $idtipodeexclusion = $request->request->get('tipodeexclusion');
            $comentarios = $request->request->get('comentarios');
            $fechactual = $request->request->get('fechaingreso');
            $fechaformat = new \DateTime;
            $fechaformat->setDate(substr($fechactual, 0, 4), substr($fechactual, 5, 2), substr($fechactual, 8, 2));
            $tipoexclusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->find($idtipodeexclusion);
            $donanteexcluido = $em->getRepository('HSYSMainBundle:Donante')->find($donanteid);
            
            $duracion = null;
            if ($tipoexclusion->getDuracion() == null){
                $duracion = $request->request->get('tiempo');
            }
            $donanteexcluido->excluir($tipoexclusion, $comentarios, $fechaformat, $duracion);
            $em->persist($donanteexcluido);
            
            $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($donacionid);
            $donacion->anularDonacion($tipoexclusion->getNombre());
            $em->persist($donacion);
            
            $em->flush();
            
            return $this->redirect($this->generateURL('confirmacion', array('accion' => "excluido", 'id' => $donanteid)));
        }
        $donacion = $em->getRepository('HSYSMainBundle:Donacion')->find($donacionid);
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($donanteid);
        $tiposExlusion = $em->getRepository('HSYSMainBundle:TipoExclusion')->findAll();
        return $this->render('HSYSMainBundle:Donante:excluir.html.twig', array('tiposExclusion' => $tiposExlusion, 'donante' => $donante, 'donacion' =>$donacion));
    }
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
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
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function verAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $habilitado = false;
        if ($donante->getExclusionesActivas() == null){
           $habilitado = true;
        }
        //hacer mas lindo el error
        if (!$donante) {
            throw $this->createNotFoundException(
                    'No se encontro el donate: ' . $id
            );
        }
        return $this->render('HSYSMainBundle:Donante:ver.html.twig', array('donante' => $donante,'habilitado'=>$habilitado));
    }
    
    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
    public function habilitarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = new Donante();
        $request = $this->getRequest();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $habilitado = false;
        if ($donante->getExclusionesActivas() == null){
           $habilitado = true;
        }
        if ($request->getMethod() == 'POST') {
            $comentario = $request->request->get('comentarios');
            $donante->habilitar($comentario);
            $em->persist($donante);
            $em->flush();
            return $this->redirect($this->generateURL('confirmacion', array('accion' => "ha sido habilitado", 'id' => $id)));
        }
        $exclusiones = $donante->getExclusionesActivas();
        return $this->render('HSYSMainBundle:Donante:habilitar.html.twig', array('id' => $id, 'donante' => $donante, 'exclusiones' => $exclusiones, 'habilitado' => $habilitado));
    }
    
    /**
    * 	@Secure(roles="ROLE_ADMIN")
    */
    public function eliminarAction($id) {
        if ($id == 1){
            return $this->render('HSYSMainBundle:Donante:error.html.twig', array('razon' => 'ACCESO DENEGADO: No se puede eliminar este donante'));
        };
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        $request = $this->getRequest();
        if ($request->getMethod()=='POST'){
            $donante->setBaja(true);
            $em->persist($donante);
            $em->flush();
            return $this->redirect($this->generateUrl('confirmacion', array('accion'=>"eliminado",'id'=>$id)));
        }
        return $this->render('HSYSMainBundle:Donante:eliminar.html.twig', array('id' => $id, 'donante'=>$donante));
    }
    
    /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function imprimirDonanteAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $donante = $em->getRepository('HSYSMainBundle:Donante')->find($id);
        return $this->render('HSYSMainBundle:Donante:impresioncuestionario.html.twig', array('donante' => $donante));
    }

    public function buscarProvinciaAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $provincias = $em->getRepository('HSYSMainBundle:Provincia')->findBy(array('Pais' => $id));
        return $this->render('HSYSMainBundle:Donante:buscarprov.html.twig', array('provincias' => $provincias));
    }

    public function buscarLocalidadAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $localidades = $em->getRepository('HSYSMainBundle:Localidad')->findBy(array('Provincia' => $id));
        return $this->render('HSYSMainBundle:Donante:buscarlocal.html.twig', array('localidades' => $localidades));
    }
    

   /**
    * 	@Secure(roles="ROLE_PERSONAL")
    */
    public function verexclusionAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $exlusion = $em->getRepository('HSYSMainBundle:Exclusion')->find($id);
        
        if (!$exlusion) {
            throw $this->createNotFoundException(
                    'No se encontro la exclusion: ' . $id
            );
        }
        return $this->render('HSYSMainBundle:Donante:verexclusion.html.twig', array('exclusion' => $exlusion));
    }
}
?>
