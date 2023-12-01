<?php

namespace AppBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PersonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $event->getData()->preSet();
        });

        $this->configureWidgets($builder);
    }

    public function configureWidgets($builder)
    {
        $builder
            ->add('firstName')
            ->add('middleName')
            ->add('lastName')
            ->add('maternalLastName')
            ->add(
                'identifications',
                CollectionType::class,
                    [
                        'entry_type' => IdentificationType::class,
                        'required' => true,
                        'allow_add' => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                        'prototype' => true,
                    ]
                )
            ->add(
                'address',
                AddressType::class,
                    [
                        'required' => true,

                    ]
                )
            ->add(
                'phone',
                PhoneType::class,
                    [
                        'required' => true,
                    ]
                );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Person'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_person';
    }
}
