<?php

namespace ProjectBundle\Form;

use ProjectBundle\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('client', EntityType::class, array(
                'class' => Client::class
            ))
            ->add('startDate')
            ->add('endDate')
            ->add('city')
            ->add('address')
            ->add('budget')
            ->add('duration')
            ->add('type')
            ->add('status', ChoiceType::class, array(
                'choices' => array('En cours' => 'En cours', 'Terminé' => 'Terminé', 'Annulé' => 'Annulé')
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjectBundle\Entity\Project'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projectbundle_project';
    }


}
