<?php

namespace AppBundle\Form;

use AppBundle\Entity\Country;
use Doctrine\ORM\EntityRepository;


use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\IndetificationClass;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentificationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                function (FormEvent $event) {
                    $this->configureWidgets($event->getForm(), $event->getData());
                }
            );

        $this->configureWidgets(
            $builder,
                [
                    'country' => $builder->getData() && $builder->getData()->getCountry()
                        ? $builder->getData()->getCountry()->getId()
                        : 0,
                ]
        );
    }

    public function configureWidgets($builder, $data = [])
    {
        $builder
            ->add('code')
            ->add(
                'country',
                EntityType::class,
                    [
                        'class'          => 'AppBundle:Country',
                        'choice_label'   => 'name',
                        'placeholder'    => 'Choose a counrty',

                    ]
            )
            ->add(
                'type',
                EntityType::class,
                    [
                        'class'          => 'AppBundle:IdentificationClass',
                        'choice_label'   => 'name',
                        'placeholder'    => 'Choose a type',
                        'required'       =>  false,
                        'query_builder'  =>  function (EntityRepository $er) use ($data) {
                            return $er->createQueryBuilder('t')
                                ->join("t.country", "c")
                                ->where("c.id = :country")
                                ->setParameter("country", $data['country'])
                                ->orderBy("t.name", "ASC");
                            }
                    ]
            );
        return $this;
    }




    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Identification'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_identification';
    }
}
