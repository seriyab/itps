<?php

namespace ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeOfConstructionMaterialsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('priceMin')->add('priceMax')
            ->add('unitOfMeasurement', ChoiceType::class, array(
                'choices' => array(
                    'Kg' => 'Kg',
                    'm3' => 'm3',
                    'm2' => 'm2',
                    'km2' => 'km2',
                    'hm2' => 'hm2',
                    'L'   => 'L',
                    'Ml'  => 'Ml'
                ),
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjectBundle\Entity\TypeOfConstructionMaterials'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projectbundle_typeofconstructionmaterials';
    }


}
