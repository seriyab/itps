<?php

namespace StaffBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClockingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment')
            ->add('personal', TextType::class , array(
                'disabled' => true
            ))
            ->add('location')
            ->add('constructionSite')
            ->add('status', ChoiceType::class, array(
                'choices' => array('Absent' => 'Absent', 'Présent' => 'Présent', 'Repot' => 'Repot', 'Déplacement' => 'Déplacement', 'Hors service' => 'Hors service'),
                'expanded' => true,
                'multiple' => false
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StaffBundle\Entity\Clocking'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'staffbundle_clocking';
    }


}
