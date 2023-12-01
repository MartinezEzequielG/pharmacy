<?php

namespace AppBundle\Controller;

use AppBundle\Entity\IdentificationClass;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Identificationclass controller.
 *
 */
class IdentificationClassController extends Controller
{
    /**
     * Lists all identificationClass entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $identificationClasses = $em->getRepository("AppBundle:IdentificationClass")->findAll();

        return $this->render("identificationclass/index.html.twig", [
                                                                        'identificationClasses' => $identificationClasses,
                                                                    ]
        );
    }

    /**
     * Creates a new identificationClass entity.
     *
     */
    public function newAction(Request $request)
    {
        $identificationClass = new Identificationclass();
        $form = $this->createForm("AppBundle\Form\IdentificationClassType", $identificationClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($identificationClass);
            $em->flush();

            return $this->redirectToRoute("identificationclass_show", [
                                                                        'id' => $identificationClass->getId()
                                                                      ]
            );
        }

        return $this->render("identificationclass/new.html.twig", [
                                                                    'identificationClass' => $identificationClass,
                                                                    'form'                => $form->createView(),
                                                                  ]
        );
    }

    /**
     * Finds and displays a identificationClass entity.
     *
     */
    public function showAction(IdentificationClass $identificationClass)
    {
        $deleteForm = $this->createDeleteForm($identificationClass);

        return $this->render("identificationclass/show.html.twig", [
                                                                        'identificationClass' => $identificationClass,
                                                                        'delete_form'         => $deleteForm->createView(),
                                                                   ]
        );
    }

    /**
     * Displays a form to edit an existing identificationClass entity.
     *
     */
    public function editAction(Request $request, IdentificationClass $identificationClass)
    {
        $deleteForm = $this->createDeleteForm($identificationClass);
        $editForm = $this->createForm("AppBundle\Form\IdentificationClassType", $identificationClass);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()
                 ->getManager()
                 ->flush();

            return $this->redirectToRoute("identificationclass_edit", [
                                                                        'id' => $identificationClass->getId()
                                                                      ]
            );
        }

        return $this->render("identificationclass/edit.html.twig", [
                                                                        'identificationClass' => $identificationClass,
                                                                        'edit_form'           => $editForm->createView(),
                                                                        'delete_form'         => $deleteForm->createView(),
                                                                   ]
        );
    }

    /**
     * Deletes a identificationClass entity.
     *
     */
    public function deleteAction(Request $request, IdentificationClass $identificationClass)
    {
        $form = $this->createDeleteForm($identificationClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($identificationClass);
            $em->flush();
        }

        return $this->redirectToRoute("identificationclass_index");
    }

    /**
     * Creates a form to delete a identificationClass entity.
     *
     * @param IdentificationClass $identificationClass The identificationClass entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IdentificationClass $identificationClass)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("identificationclass_delete", ['id' => $identificationClass->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
