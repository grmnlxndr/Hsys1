<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HSYS\MainBundle\Entity\Usuario;
use HSYS\MainBundle\Form\UsuarioType;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Usuario controller.
 *
 * @Route("/admin/usuario")
 */
class UsuarioController extends Controller {

    /**
     * Lists all Usuario entities.
     *
     * @Route("/", name="admin_usuario")
     * @Template()
     * 
     */
    /*
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('HSYSMainBundle:Usuario')->findAll();
        return array('entities' => $entities,);
    }

    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}/show", name="admin_usuario_show")
     * @Template()
     * 
     */
    /*
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     * @Route("/new", name="admin_usuario_new")
     * @Template()
     *
     */
    /* 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction() {
        $entity = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new Usuario entity.
     *
     * @Route("/create", name="admin_usuario_create")
     * @Method("POST")
     * @Template("HSYSMainBundle:Usuario:new.html.twig")
     */
    /* 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request) {
        $entity = new Usuario();
        $form = $this->createForm(new UsuarioType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $this->setSecurePassword($entity);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_usuario_show', array('id' => $entity->getId())));
        }


        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     * @Route("/{id}/edit", name="admin_usuario_edit")
     * @Template()
     */
    /* 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createForm(new UsuarioType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Usuario entity.
     *
     * @Route("/{id}/update", name="admin_usuario_update")
     * @Method("POST")
     * @Template("HSYSMainBundle:Usuario:edit.html.twig")
     */
    /* 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UsuarioType(), $entity);

        $request = $this->getRequest();
        $current_pass = $entity->getPassword();

        $editForm->bind($request);


        if ($editForm->isValid()) {
            if ($current_pass != $entity->getPassword()) {
                $this->setSecurePassword($entity);
            }
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_usuario_edit', array('id' => $id)));
        }


        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}/delete", name="admin_usuario_delete")
     * @Method("POST")
     */
    /* 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HSYSMainBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_usuario'));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }

}
