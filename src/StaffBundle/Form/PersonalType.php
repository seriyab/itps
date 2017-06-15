<?php

namespace StaffBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array(
                'required' => true
            ))
            ->add('lastname')
            ->add('birthdate', DateType::class, array(
                'html5' => true,
                'widget' => 'single_text',
                'required' => false
            ))
            ->add('phone')
            ->add('mobile')
            ->add('mail')
            ->add('address')
            ->add('martialStatus', ChoiceType::class, array(
                'choices' => array(
                    'Célibataire' => 'Célibataire',
                    'Marié' => 'Marié',
                    'Fiancé' => 'Fiancé',
                    'Divorcé' => 'Divorcé',
                    'Rien' => 'rien',
                )
            ))
            ->add('drivingLicense', ChoiceType::class, array(
                'choices' => array(
                    'Aucun' => 'aucun',
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'D+E' => 'D+E',
                )
            ))
            ->add('isTemporary', CheckboxType::class, array(
                'required' => false
            ))
            ->add('contracts', CollectionType::class, array(
                'entry_type' => EmploymentContractType::class,
                'allow_add' => true,
                'allow_delete' => true
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StaffBundle\Entity\Personal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'staffbundle_personal';
    }


}
