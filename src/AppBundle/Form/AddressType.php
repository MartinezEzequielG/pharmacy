<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
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

        $this->configureWidgets(
            $builder,
                [
                    'state'   => $builder->getData() && $builder->getData()->getState()
                    ? $builder->getData()->getState()->getId()
                    : 0,
                    'city'    => $builder->getData() && $builder->getData()->getCity()
                    ? $builder->getData()->getCity()->getId()
                    : 0,
                    'country' => $builder->getData() && $builder->getData()->getCountry()
                    ? $builder->getData()->getCountry()->getId()
                    : 0,
                ]        
        );   
    }
    
    public function configureWidgets($builder, $data = [])
    {
        $builder
            ->add('street')
            ->add('number')
            ->add('country', 
                EntityType::class, 
                    [
                        'class'        => 'AppBundle:Country',
                        'choice_label' =>  'name',
                    ]
                );

        $builder
            ->add('state', 
                EntityType::class, 
                    [
                        'class'         => 'AppBundle:State',
                        'choice_label'  => 'name',
                        'placeholder'   => 'Choose a state',
                        'required'      => false,
                        'query_builder' => function (EntityRepository $er) use ($data)
                                            {
                                                return $er->createQueryBuilder('s')
                                                    ->join("s.country", "c")
                                                    ->where("c.id = :country")
                                                    ->setParameter("country", $data['country'])
                                                    ->orderBy("s.name", "ASC");
                                            }    
                            
                    ]
                );

        $builder
            ->add('city', 
                EntityType::class, 
                    [
                        'class'         => 'AppBundle:City',
                        'choice_label'  => 'name',
                        'placeholder'   => 'Choose a city',
                        'required'      => false,
                        'query_builder' => function (EntityRepository $er) use ($data)
                                            {
                                                return $er->createQueryBuilder('ct')
                                                    ->join("ct.state", "s")
                                                    ->where("s.id = :state")
                                                    ->setParameter("state", $data['state'])
                                                    ->orderBy("ct.name", "ASC");
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
        $resolver->setDefaults([
                                'data_class' => "AppBundle\Entity\Address"
                               ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return "appbundle_address";
    }


}
