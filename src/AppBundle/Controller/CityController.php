<?php

namespace AppBundle\Controller;

use AppBundle\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * City controller.
 *
 */
class CityController extends Controller
{
    /**
     * Lists all city entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cities = $em->getRepository('AppBundle:City')->findAll();

        return $this->render("city/index.html.twig", [
                                                        'cities' => $cities,
                                                     ]
        );
    }

    /**
     * Creates a new city entity.
     *
     */
    public function newAction(Request $request)
    {
        $city = new City();
        $form = $this->createForm('AppBundle\Form\CityType', $city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($city->getName() && $city->getState() && $city->getCountry()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($city);
                $em->flush();
                return $this->redirectToRoute("city_show", [
                                                             'id' => $city->getId()
                                                           ]
            );
            }    
        }

        return $this->render("city/new.html.twig", [
                                                        'city' => $city,
                                                        'form' => $form->createView(),
                                                   ]
        );
    }

    /**
     * Finds and displays a city entity.
     *
     */
    public function showAction(City $city)
    {
        $deleteForm = $this->createDeleteForm($city);
        
        return $this->render("city/show.html.twig", [
                                                        'city'        => $city,
                                                        'delete_form' => $deleteForm->createView(),
                                                    ]
        );
    }

    /**
     * Displays a form to edit an existing city entity.
     *
     */
    public function editAction(Request $request, City $city)
    {
        $deleteForm = $this->createDeleteForm($city);
        $editForm = $this->createForm('AppBundle\Form\CityType', $city);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("city_show", [
                                                        'id'          => $city->getId()
                                                       ]
            );
        }

        return $this->render("city/edit.html.twig", [
                                                        'city'        => $city,
                                                        'edit_form'   => $editForm->createView(),
                                                        'delete_form' => $deleteForm->createView(),
                                                    ]
        );
    }

    /**
     * Deletes a city entity.
     *
     */
    public function deleteAction(Request $request, City $city)
    {
        $form = $this->createDeleteForm($city);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($city);
            $em->flush();
        }

        return $this->redirectToRoute("city_index");
    }

    /**
     * Creates a form to delete a city entity.
     *
     * @param City $city The city entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(City $city)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("city_delete", ['id' => $city->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
