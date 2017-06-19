<?php

namespace StaffBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClockingPersonalsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clocking', CollectionType::class, array(
                'entry_type' => ClockingType::class,
                'allow_add' => true,
                'allow_delete' => true
            ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'staffbundle_clockingpersonals';
    }


}
