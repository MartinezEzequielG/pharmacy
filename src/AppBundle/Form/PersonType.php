<?php

namespace AppBundle\Form;

use AppBundle\Entity\Phone;
use AppBundle\Entity\Address;
use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\Identification;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PersonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->addEventListener(
            FormEvents::PRE_SUBMIT, function (FormEvent $event)
            {
                $this->configureWidgets($event->getForm(), $event->getData());
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
            ->add('identifications',
                CollectionType::class,
                    [
                        'entry_type' => IdentificationType::class,
                        'required'=>true,
                    ])
            ->add('address', 
                AddressType::class,
                    [
                        'required'=>true, 

                    ])
            ->add('phone', 
                PhoneType::class, 
                    [
                        'required'=>true,
                    ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
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
