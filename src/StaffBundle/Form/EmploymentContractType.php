<?php

namespace StaffBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmploymentContractType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'SIVP' => 'SIVP',
                    'Stagiaire' => 'Stagiaire'
                )
            ))
            ->add('personal')
            ->add('function')
            ->add('startDate', DateType::class)
            ->add('endDate', DateType::class)
            ->add('signatureDate', DateType::class)
            ->add('salary', IntegerType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StaffBundle\Entity\EmploymentContract'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'staffbundle_employmentcontract';
    }


}
