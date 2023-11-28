<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Identification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Identification controller.
 *
 */
class IdentificationController extends Controller
{
    /**
     * Lists all identification entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $identifications = $em->getRepository('AppBundle:Identification')->findAll();

        return $this->render("identification/index.html.twig", [
                                                                'identifications' => $identifications,
                                                               ]
        );
    }

    /**
     * Creates a new identification entity.
     *
     */
    public function newAction(Request $request)
    {
        $identification = new Identification();
        $form = $this->createForm('AppBundle\Form\IdentificationType', $identification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($identification);
            $em->flush();

            return $this->redirectToRoute("identification_show", [
                                                                    'id' => $identification->getId()
                                                                 ]
            );
        }

        return $this->render("identification/new.html.twig", [
                                                                'identification' => $identification,
                                                                'form'           => $form->createView(),
                                                             ]
        );
    }

    /**
     * Finds and displays a identification entity.
     *
     */
    public function showAction(Identification $identification)
    {
        $deleteForm = $this->createDeleteForm($identification);

        return $this->render("identification/show.html.twig", [
                                                                'identification' => $identification,
                                                                'delete_form'    => $deleteForm->createView(),
                                                              ]
        );
    }

    /**
     * Displays a form to edit an existing identification entity.
     *
     */
    public function editAction(Request $request, Identification $identification)
    {
        $deleteForm = $this->createDeleteForm($identification);
        $editForm = $this->createForm('AppBundle\Form\IdentificationType', $identification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("identification_edit", [
                                                                    'id' => $identification->getId()
                                                                 ]
            );
        }

        return $this->render("identification/edit.html.twig", [
                                                                'identification' => $identification,
                                                                'edit_form'      => $editForm->createView(),
                                                                'delete_form'    => $deleteForm->createView(),
                                                              ]
        );
    }

    /**
     * Deletes a identification entity.
     *
     */
    public function deleteAction(Request $request, Identification $identification)
    {
        $form = $this->createDeleteForm($identification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($identification);
            $em->flush();
        }

        return $this->redirectToRoute("identification_index");
    }

    /**
     * Creates a form to delete a identification entity.
     *
     * @param Identification $identification The identification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Identification $identification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("identification_delete", ['id' => $identification->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
