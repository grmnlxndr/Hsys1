<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HSYS\MainBundle\Entity\Pais;
use HSYS\MainBundle\Entity\Provincia;
use HSYS\MainBundle\Entity\Localidad;
use HSYS\MainBundle\Entity\Anticoagulante;
use HSYS\MainBundle\Entity\MarcaBolsa;
use HSYS\MainBundle\Entity\TipoBolsa;
use HSYS\MainBundle\Entity\Hospital;
use HSYS\MainBundle\Entity\ocupacion;
use HSYS\MainBundle\Entity\CausaAnulacionDonacion;
use HSYS\MainBundle\Entity\NivelEducativo;
use HSYS\MainBundle\Form\TablaType;
use HSYS\MainBundle\Form\ProvinciaType;
use HSYS\MainBundle\Form\LocalidadType;
use JMS\SecurityExtraBundle\Annotation\Secure;

class AdminController extends Controller {

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function indexAction() {
        return $this->render('HSYSMainBundle:Admin:index.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function tablaAction() {
        return $this->render('HSYSMainBundle:Admin:tabla.html.twig');
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function paisAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $pais = new Pais();
        $form = $this->createForm(new TablaType(), $pais);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($pais);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'pais', 'nombre' => $pais->getNombre(),));
            }
        }
        $paises = $em->getRepository('HSYSMainBundle:Pais')->findAll();
        return $this->render('HSYSMainBundle:Admin:pais.html.twig', array('paises' => $paises, 'form' => $form->createView()));
    }
    
    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function provinciaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $provincia = new Provincia();
        $form = $this->createForm(new ProvinciaType(), $provincia);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($provincia);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'provincia', 'nombre' => $provincia->getNombre(),));
            }
        }
        $provincias = $em->getRepository('HSYSMainBundle:Provincia')->findAll();
        return $this->render('HSYSMainBundle:Admin:provincia.html.twig', array('provincias' => $provincias, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function localidadAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $localidad = new Localidad();
        $form = $this->createForm(new LocalidadType(), $localidad);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($localidad);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'localidad', 'nombre' => $localidad->getNombre(),));
            }
        }
        $localidades = $em->getRepository('HSYSMainBundle:Localidad')->findAll();
        return $this->render('HSYSMainBundle:Admin:localidad.html.twig', array('localidades' => $localidades, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function anticoagulanteAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $anticoagulante = new Anticoagulante();
        $form = $this->createForm(new TablaType(), $anticoagulante);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($anticoagulante);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'anticoagulante', 'nombre' => $anticoagulante->getNombre(),));
            }
        }
        $anticoagulantes = $em->getRepository('HSYSMainBundle:Anticoagulante')->findAll();
        return $this->render('HSYSMainBundle:Admin:anticoagulante.html.twig', array('anticoagulantes' => $anticoagulantes, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function tipobolsaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $tipoBolsa = new TipoBolsa();
        $form = $this->createForm(new TablaType(), $tipoBolsa);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($tipoBolsa);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'tipobolsa', 'nombre' => $tipoBolsa->getNombre(),));
            }
        }
        $tipobolsas = $em->getRepository('HSYSMainBundle:TipoBolsa')->findAll();
        return $this->render('HSYSMainBundle:Admin:tipobolsa.html.twig', array('tipobolsas' => $tipobolsas, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function marcabolsaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $marcaBolsa = new MarcaBolsa();
        $form = $this->createForm(new TablaType(), $marcaBolsa);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($marcaBolsa);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'marcabolsa', 'nombre' => $marcaBolsa->getNombre(),));
            }
        }
        $marcabolsas = $em->getRepository('HSYSMainBundle:MarcaBolsa')->findAll();
        return $this->render('HSYSMainBundle:Admin:marcabolsa.html.twig', array('marcabolsas' => $marcabolsas, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function ocupacionAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $ocupacion = new ocupacion();
        $form = $this->createForm(new TablaType(), $ocupacion);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($ocupacion);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'ocupacion', 'nombre' => $ocupacion->getNombre(),));
            }
        }
        $ocupaciones = $em->getRepository('HSYSMainBundle:ocupacion')->findAll();
        return $this->render('HSYSMainBundle:Admin:ocupacion.html.twig', array('ocupaciones' => $ocupaciones, 'form' => $form->createView()));
    }

    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function hospitalAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $hospital = new Hospital();
        $form = $this->createForm(new TablaType(), $hospital);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($hospital);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'hospital', 'nombre' => $hospital->getNombre(),));
            }
        }
        $hospitales = $em->getRepository('HSYSMainBundle:Hospital')->findAll();
        return $this->render('HSYSMainBundle:Admin:hospital.html.twig', array('hospitales' => $hospitales, 'form' => $form->createView()));
    }
    
    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function causaanulaciondonacionAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $causa = new CausaAnulacionDonacion();
        $form = $this->createForm(new TablaType(), $causa);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($causa);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'causa', 'nombre' => $causa->getNombre(),));
            }
        }
        $causas = $em->getRepository('HSYSMainBundle:CausaAnulacionDonacion')->findAll();
        return $this->render('HSYSMainBundle:Admin:causa.html.twig', array('causas' => $causas, 'form' => $form->createView()));
    }
    
    /**
     * 	@Secure(roles="ROLE_ADMIN")
     */
    public function niveleducativoAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $nivel = new NivelEducativo();
        $form = $this->createForm(new TablaType(), $nivel);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em->persist($nivel);
                $em->flush();
                return $this->render('HSYSMainBundle:Admin:confirmacion.html.twig', array('dato' => 'nivel', 'nombre' => $nivel->getNombre(),));
            }
        }
        $niveles = $em->getRepository('HSYSMainBundle:NivelEducativo')->findAll();
        return $this->render('HSYSMainBundle:Admin:nivel.html.twig', array('niveles' => $niveles, 'form' => $form->createView()));
    }

}
