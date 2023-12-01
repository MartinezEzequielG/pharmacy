<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Person controller.
 *
 */
class PersonController extends Controller
{
    /**
     * Lists all person entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $people = $em->getRepository("AppBundle:Person")->findAll();

        return $this->render("person/index.html.twig", [
                                                            'people' => $people,
                                                       ]
        );
    }

    /**
     * Creates a new person entity.
     *
     */
    public function newAction(Request $request)
    {
        $person = new Person();
        $form = $this->createForm("AppBundle\Form\PersonType", $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($person->isCompleted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute("person_show", [
                                                            'id' => $person->getId()
                                                         ]
            );
        }
    }

        return $this->render("person/new.html.twig", [
                                                        'person' => $person,
                                                        'form'   => $form->createView(),           
                                                     ]
        );
    
    }

    /**
     * Finds and displays a person entity.
     *
     */
    public function showAction(Person $person)
    {
        $deleteForm = $this->createDeleteForm($person);

        return $this->render("person/show.html.twig", [
                                                        'person'      => $person,
                                                        'delete_form' => $deleteForm->createView(),
                                                      ]
        );
    }

    /**
     * Displays a form to edit an existing person entity.
     *
     */
    public function editAction(Request $request, Person $person)
    {
        $deleteForm = $this->createDeleteForm($person);
        $editForm = $this->createForm("AppBundle\Form\PersonType", $person);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if ($person->isCompleted()){

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("person_show", [
                                                            'id' => $person->getId()
                                                         ]
            );
        }
    }

        return $this->render("person/edit.html.twig", [
                                                        'person'      => $person,
                                                        'edit_form'   => $editForm->createView(),
                                                        'delete_form' => $deleteForm->createView(),
                                                      ]
        );
    }

    /**
     * Deletes a person entity.
     *
     */
    public function deleteAction(Request $request, Person $person)
    {
        $form = $this->createDeleteForm($person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($person);
            $em->flush();
        }

        return $this->redirectToRoute("person_index");
    }

    /**
     * Creates a form to delete a person entity.
     *
     * @param Person $person The person entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Person $person)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("person_delete", ['id' => $person->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
