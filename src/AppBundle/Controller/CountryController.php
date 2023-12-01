<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Country;
use AppBundle\Form\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CountryController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $country = $em->getRepository("AppBundle:Country")->findAll();

        return $this->render("country/index.html.twig",[
                                                         'country'     => $country,
                                                       ]   
        );
    }

    public function newAction(Request $request)
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($country);
            $em->flush();
            return $this->redirectToRoute("show_country", [
                                                             'id'     => $country->getId()
                                                          ]
            );   
        }

        return $this->render("country/new.html.twig", [
                                                        'form'        => $form->createView(),
                                                      ]
        );

    }

    public function showAction(Country $country)
    {
        $deleteForm = $this->createDeleteForm($country);


        return $this->render("country/show.html.twig", [
                                                        'country'     => $country,
                                                        'delete_form' => $deleteForm->createView(),
                                                       ]           
        );

    }
    
    public function editAction(Request $request, Country $country)
    {
        $deleteForm = $this->createDeleteForm($country);
        $editForm = $this->createForm(CountryType::class, $country);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute("show_country", [
                                                            'id'      => $country->getId()
                                                          ]
            );
        }

        return $this->render("country/edit.html.twig", [
                                                        'country'     => $country,
                                                        'edit_form'   => $editForm->createView(),
                                                        'delete_form' => $deleteForm->createView(),
                                                       ]
        );
    }

    
    public function deleteAction (Request $request, Country $country)
    {
        $form = $this->createDeleteForm($country);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($country);
            $em->flush();
        }

        return $this->redirectToRoute("index_country");
         
    }

    private function createDeleteForm(Country $country)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl("delete_country", ['id'   => $country->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}