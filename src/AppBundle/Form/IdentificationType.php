<?php

namespace AppBundle\Form;

use AppBundle\Entity\Country;
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
        $this->configureWidgets($builder);   
    }

    public function configureWidgets($builder)
    {
         $builder
        ->add('code')
        ->add('country', 
            EntityType::class, 
                [
                    'class'          => 'AppBundle:Country',
                    'choice_label'   => 'name',
                    'placeholder'    => 'Choose a counrty',

                ]
        )
        ->add('type', 
            EntityType::class, 
                [
                    'class'          => 'AppBundle:IdentificationClass',
                    'choice_label'   => 'name',
                    'placeholder'    => 'Choose a type',
                ]
        );
        return $this;
    }




    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
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
