<?php

namespace AppBundle\Controller;

use AppBundle\Entity\State;
use AppBundle\Form\StateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * State controller.
 *
 */
class StateController extends Controller
{
    /**
     * Lists all state entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $state = $em->getRepository('AppBundle:State')->findAll();

        return $this->render("state/index.html.twig", [
                                                        'state' => $state,
                                                      ]
        );
    }

    /**
     * Creates a new state entity.
     *
     */
    public function newAction(Request $request)
    {
        $state = new State();
        $form = $this->createForm('AppBundle\Form\StateType', $state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($state);
            $em->flush();

            return $this->redirectToRoute("state_show", [
                                                          'id'  => $state->getId()
                                                        ]
            );
        }

        return $this->render("state/new.html.twig",[
                                                        'state' => $state,
                                                        'form'  => $form->createView(),          
                                                   ]
        );
    }

    /**
     * Finds and displays a state entity.
     *
     */
    public function showAction(State $state)
    {
        $deleteForm = $this->createDeleteForm($state);

        return $this->render("state/show.html.twig", [
                                                        'state'       => $state,
                                                        'delete_form' => $deleteForm->createView(),
                                                     ]
        );
    }

    /**
     * Displays a form to edit an existing state entity.
     *
     */
    public function editAction(Request $request, State $state)
    {
        $deleteForm = $this->createDeleteForm($state);
        $editForm = $this->createForm('AppBundle\Form\StateType', $state);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("state_edit", [
                                                         'id'   => $state->getId()
                                                        ]
            );
        }

        return $this->render("state/edit.html.twig", [
                                                        'state'       => $state,
                                                        'edit_form'   => $editForm->createView(),
                                                        'delete_form' => $deleteForm->createView(),
                                                     ]
        );
    }

    /**
     * Deletes a state entity.
     *
     */
    public function deleteAction(Request $request, State $state)
    {
        $form = $this->createDeleteForm($state);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($state);
            $em->flush();
        }

        return $this->redirectToRoute("state_index");
    }

    /**
     * Creates a form to delete a state entity.
     *
     * @param State $state The state entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(State $state)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("state_delete", ['id'    => $state->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
