<?php

namespace StaffBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LeaveApplicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('startAt', DateType::class, array(
                'widget' => 'single_text',
                'html5'  => true,
                'required' => false,
                'data' => new \DateTime("now")
            ))
                ->add('endAt', DateType::class, array(
                'widget' => 'single_text',
                'html5'  => true,
                'required' => false,
                'data' => new \DateTime("now")
            ))
                ->add('status', ChoiceType::class, array(
                'choices' => array(
                    'En cours' => 'En cours',
                    'Accepté' => 'Accepté',
                    'Annulé' => 'Annulé',
                    'Refusé' => 'Rrfusé'
                )
            ))
                ->add('comment', TextType::class, array(
                    'required' => false
                ))
                ->add('personal')
                ->add('approvedBy');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StaffBundle\Entity\LeaveApplication'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'staffbundle_leaveapplication';
    }


}
