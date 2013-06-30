<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HSYS\MainBundle\Entity\Role;
use HSYS\MainBundle\Form\RoleType;

use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Role controller.
 *
 * @Route("/admin")
 */
class RoleController extends Controller
{
    /**
     * Lists all Role entities.
     *
     * @Route("/", name="admin")
     * @Template()
     *
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HSYSMainBundle:Role')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Role entity.
     *
     * @Route("/{id}/show", name="admin_show")
     * @Template()
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Role')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Role entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Role entity.
     *
     * @Route("/new", name="admin_new")
     * @Template()
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction()
    {
        $entity = new Role();
        $form   = $this->createForm(new RoleType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Role entity.
     *
     * @Route("/create", name="admin_create")
     * @Method("POST")
     * @Template("HSYSMainBundle:Role:new.html.twig")
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function createAction(Request $request)
    {
        $entity  = new Role();
        $form = $this->createForm(new RoleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Role entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Template()
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Role')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Role entity.');
        }

        $editForm = $this->createForm(new RoleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Role entity.
     *
     * @Route("/{id}/update", name="admin_update")
     * @Method("POST")
     * @Template("HSYSMainBundle:Role:edit.html.twig")
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HSYSMainBundle:Role')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Role entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RoleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Role entity.
     *
     * @Route("/{id}/delete", name="admin_delete")
     * @Method("POST")
     * 
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HSYSMainBundle:Role')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Role entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
